using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using EntityFramework_Homework;

namespace EntityFramework_Homework
{
    class Ex_3FindCustomersByOrderDateAndShipCity
    {
        static void Main(string[] args)
        {
            FindCustomersByOrderDateAndShipCity(1997, "Canada");            
        }
        public static void FindCustomersByOrderDateAndShipCity(int orderDate,string shipCountry)
        {
            NorthwindEntities context = new NorthwindEntities();
            var customerQuery = from c in context.Customers
                                join o in context.Orders on c.CustomerID equals o.CustomerID
                                where o.OrderDate.Value.Year == orderDate
                                where o.ShipCountry == shipCountry
                                select c.CompanyName;
            
            foreach(var customer in  customerQuery) {
                Console.WriteLine(customer);
            }

        }
        

    }
}
