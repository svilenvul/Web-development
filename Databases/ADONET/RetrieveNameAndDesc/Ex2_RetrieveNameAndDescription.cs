using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data.SqlClient;

namespace ADONET
{
    class Ex2_RetrieveNameAndDescription
    {
        static void Main(string[] args)
        {
            string connectionString = "Server=.\\SQLEXPRESS;Database=Northwind;Integrated Security=true";
            SqlConnection con = new SqlConnection(connectionString);
            con.Open();
            using (con)
            {
                string retrieveQuery = "SELECT CategoryName,Description FROM Categories";
                SqlCommand retrieve = new SqlCommand(retrieveQuery, con);
                var reader = retrieve.ExecuteReader();

                string name, description;

                Console.WriteLine("Product category and Description");
                while (reader.Read())
                {
                    name = (string)reader["CategoryName"];
                    description = (string)reader["Description"];
                    Console.WriteLine(name + ":" + description);
                }

            }
        }
    }
}
