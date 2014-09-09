using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using EntityFramework_Homework;

namespace EntityFramework_Homework
{
    public class Ex2_DAOCustomers
    {
        private static NorthwindEntities context = new NorthwindEntities();  
      
        public static void insertCustomer(string [] data)
        {
            using (context)
            {
                var customer = new Customer();
                customer.CompanyName = data[0];
                customer.ContactName = data[0];
                customer.ContactTitle = data[0];
                customer.Address = data[0];
                customer.City = data[0];
                customer.Region = data[0];
                customer.PostalCode = data[0];
                customer.Country = data[0];
                customer.Phone = data[0];
                customer.Fax = data[0];
                context.Customers.Add(customer);
                context.SaveChanges();         
               
            }

        }

        public static void deleteCustomer ()
        {
            using (context)
            {
               
            }
        }

        public static void modifyCustomer()
        {
            using (context)
            {

            }
        }

    }    
}
