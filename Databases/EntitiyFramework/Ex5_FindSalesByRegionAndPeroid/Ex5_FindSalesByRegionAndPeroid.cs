using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using EntityFramework_Homework;

namespace Ex5_FindSalesByRegionAndPeroid
{
    class Ex5_FindSalesByRegionAndPeroid
    {
        static void Main(string[] args)
        {
            findSalesByRegionAndPeriod("RJ", Convert.ToDateTime("01/08/1995"), Convert.ToDateTime("01/08/1998"));
        }
        public static void findSalesByRegionAndPeriod(string region, DateTime startDate,DateTime endDate)
        {
            NorthwindEntities context = new NorthwindEntities();
            using (context)
            {
                var sales = context.Orders.Where(o => o.ShipRegion == region).Where(o => o.ShippedDate > startDate).Where(o => o.ShippedDate < endDate);
                foreach (var sale in sales) 
                {
                    Console.WriteLine(sale.OrderID);
                }
            }
        }
    }
}
