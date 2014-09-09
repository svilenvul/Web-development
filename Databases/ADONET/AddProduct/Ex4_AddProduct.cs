using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data.SqlClient;

namespace Ex4_AddProduct
{
    class Ex4_AddProduct
    {
        private static void addProduct(SqlConnection connection, String productName, int supplierID, int categoryID, String quantityPerUnit, double unitPrice, int unitsInStock, int unitsOnOrder, int reorderLevel, bool discontinued)
        {
            SqlCommand insert = new SqlCommand(
                "INSERT INTO Products (ProductName,SupplierID,CategoryId,QuantityPerUnit,UnitPrice,UnitsInStock,UnitsOnOrder,ReorderLevel,Discontinued) VALUES" +
                "(@productName,@supplierID,@categoryID,@quantityPerUnit,@unitPrice,@bunitsInStock,@unitsOnOrder,@reorderLevel,@discontinued)", connection);
            insert.Parameters.AddWithValue("@productName", productName);
            insert.Parameters.AddWithValue("@supplierID", supplierID);
            insert.Parameters.AddWithValue("@categoryID", categoryID);
            insert.Parameters.AddWithValue("@quantityPerUnit", quantityPerUnit);
            insert.Parameters.AddWithValue("@unitPrice", unitPrice);
            insert.Parameters.AddWithValue("@unitsInStock", unitsInStock);
            insert.Parameters.AddWithValue("@unitsOnOrder", unitsOnOrder);
            insert.Parameters.AddWithValue("@reorderLevel", reorderLevel);       
            insert.Parameters.AddWithValue("@discontinued", discontinued);
            int result = insert.ExecuteNonQuery();
            if (result == 1)
            {
                Console.WriteLine("Succsesifully added");
            }
            else
            {
                Console.WriteLine("Error");
            }

        }

        static void Main(string[] args)
        {
            string connectionString = "Server=.\\SQLEXPRESS;Database=Northwind;Integrated Security=true";
            SqlConnection connection = new SqlConnection(connectionString);
 
            connection.Open();
            using(connection) 
            {
                String name = "Haribo";
                String quan = "10 bags";
                bool test = true;
                addProduct(connection, name, 4, 2, quan, 7.0, 40, 5, 10, test);
            }
        }       
    }
}
