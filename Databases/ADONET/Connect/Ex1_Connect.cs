using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data.SqlClient;

namespace Ex1_Connect
{
    class Ex1_Connect
    {
        static void Main(string[] args)
        {
            var connectionString = "Server=.\\SQLEXPRESS;Database=Northwind;Integrated Security=true";
            SqlConnection con = new SqlConnection(connectionString);
            con.Open();
            using (con)
            {

                SqlCommand retrive = new SqlCommand("SELECT COUNT(CategoryID) FROM Categories", con);
                var numbersOfRows = retrive.ExecuteScalar();
                Console.WriteLine("The number of rows is: " + numbersOfRows);
            }
        }
    }   
}
