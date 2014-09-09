using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data.SqlClient;
using System.Transactions;

namespace ATM
{
    public class Transactions
    {
        private static string connectionString = "Server=.\\SQLEXPRESS;Database=DT16TransactionsATM;Integrated Security=true";

        public static void Main(string[] args)
        {
            string cardNumber = "1234567890";
            string cardPIN = "4587";
            decimal money = 20;
            retrieveMoney(cardNumber, cardPIN, money);
        }

        public static void retrieveMoney(string cardNumber, string cardPIN, decimal money)
        {
            SqlConnection dbCon = new SqlConnection(connectionString);
            dbCon.Open();

            using (dbCon)
            {
                using (TransactionScope tranScope = new TransactionScope())
                {
                    try
                    {
                        SqlCommand searchAccount = new SqlCommand();
                        searchAccount.CommandText = @"SELECT CardCash FROM CardAccounts WHERE CardNumber = @cardNumber AND CardPin = @cardPIN";
                        string[] param = { cardNumber, cardPIN };
                        searchAccount.Parameters.AddWithValue("@cardNumber", cardNumber);
                        searchAccount.Parameters.AddWithValue("@cardPIN", cardPIN);
                        searchAccount.Connection = dbCon;
                        var accountOldAmount = searchAccount.ExecuteScalar();

                        if (accountOldAmount == null)
                        {
                            throw new Exception("PIN number or account number are invalid !");
                        }

                        decimal accountNewAmount = (decimal)accountOldAmount - money;

                        if (accountNewAmount < 0)
                        {
                            throw new Exception("Not enough money in the account !");
                        }

                        SqlCommand updateAccount = new SqlCommand();
                        updateAccount.CommandText = @"UPDATE CardAccounts SET CardCash = @newAmount WHERE CardNumber = @cardNumber AND CardPin = @cardPIN";
                        updateAccount.Parameters.AddWithValue("@newAmount", accountNewAmount);
                        updateAccount.Parameters.AddWithValue("@cardNumber", cardNumber);
                        updateAccount.Parameters.AddWithValue("@cardPIN", cardPIN);
                        updateAccount.Connection = dbCon;
                        var updateStatus = updateAccount.ExecuteNonQuery();

                        if (updateStatus < 1)
                        {
                            throw new Exception("Error in updating account !");
                        }

                        Console.WriteLine("Account successfully updated.");

                        updateHistory(dbCon, cardNumber, accountNewAmount);

                        Console.WriteLine("History successfully updated.");
                        tranScope.Complete();
                    }

                    catch (Exception e)
                    {
                        Console.WriteLine(e);
                    }

                    finally
                    {
                        dbCon.Close();
                    }
                }

            }
        }

        public static void updateHistory(SqlConnection dbCon,string cardNumber,decimal newAmount) 
        {
            using (TransactionScope innerTranScope = new TransactionScope(TransactionScopeOption.Required))
            {              
                SqlCommand searchAccount = new SqlCommand();
                searchAccount.CommandText = "INSERT INTO TransactionHistory VALUES(@cardNumber,@tranDate,@newAmount)";
                searchAccount.Parameters.AddWithValue("@cardNumber",cardNumber);
                searchAccount.Parameters.AddWithValue("@tranDate", DateTime.Now);
                searchAccount.Parameters.AddWithValue("@newAmount",newAmount);
                searchAccount.Connection = dbCon;
                var insertStatus = searchAccount.ExecuteNonQuery();

                if (insertStatus < 1)
                {
                    throw new Exception("Error in writting into history !");
                }

                innerTranScope.Complete();
               
            }
        }
    }
}
