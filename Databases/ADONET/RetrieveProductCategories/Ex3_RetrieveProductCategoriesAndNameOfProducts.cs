using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data;
using System.Data.SqlClient;

namespace ADONET
{
    class Ex3_RetrieveProductCategoriesAndNameOfProducts
    {
        static void Main(string[] args)
        {
            var connectionString = "Server=.\\SQLEXPRESS;Database=Northwind;Integrated Security=true";
            SqlConnection con = new SqlConnection(connectionString);
            con.Open();
            using (con)
            {
                string retrieveQuery = 
                    "SELECT c.CategoryName AS [Product Category],p.ProductName AS [Product Name] "+
                    "FROM Categories c JOIN Products p ON c.CategoryID = p.CategoryID";
                SqlCommand command = new SqlCommand(retrieveQuery, con);
                var reader = command.ExecuteReader();
                string productName, category;

                while (reader.Read())
                {
                    category = (string)reader["Product Category"];
                    productName = (string)reader["Product Name"];
                    Console.WriteLine(category + ":" + productName);
                }
            }
        }
    }   
    
}
