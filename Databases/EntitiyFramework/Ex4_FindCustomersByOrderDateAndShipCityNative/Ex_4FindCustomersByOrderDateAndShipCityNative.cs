using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using EntityFramework_Homework;

namespace EntityFramework_Homework
{
    class Ex_4FindCustomersByOrderDateAndShipCityNative
    {
        static void Main(string[] args)
        {           
            FindCustomersByOrderDateAndShipCityNative(1997, "Canada");
        }

        public static void FindCustomersByOrderDateAndShipCityNative(int orderDate, string shipCountry)
        {
            NorthwindEntities context = new NorthwindEntities();
            var sqlQuerry = "SELECT " +
                "CompanyName AS [CompanyName] " +
                "FROM  [dbo].[Customers]  c " +
                "INNER JOIN [dbo].[Orders]  o ON o.CustomerID = c.CustomerID ";

            object[] parameters = { orderDate, shipCountry };
            var customers = context.Customers.SqlQuery(sqlQuerry, parameters);
            foreach (var customer in customers)
            {
                Console.WriteLine(customer);
            }
        }
    }
}
