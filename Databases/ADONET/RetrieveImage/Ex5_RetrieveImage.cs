using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data.SqlClient;
using System.Data;
using System.Drawing;
using System.IO;
using System.Drawing;
using System.Drawing.Imaging;


namespace Ex5_RetrieveImage
{    

    class Ex5_RetrieveImage
    {

        private  static String fileName = "D:\\image.bmp";

        public static void Main(string[] args)
        {
            string connectionString = "Server=.\\SQLEXPRESS;Database=Northwind;Integrated Security=true";
            SqlConnection con = new SqlConnection(connectionString);
            con.Open();

            MemoryStream memStream = new MemoryStream();
            using (con)
            {
                SqlCommand retrivePict = new SqlCommand("SELECT Picture FROM Categories WHERE CategoryID = 2", con);
                SqlDataReader reader = retrivePict.ExecuteReader();
                byte[] data = null;
                while (reader.Read()) 
                {                    
                    data = (byte[])reader["Picture"];
                }

                if (data == null)
                {
                    Console.WriteLine("Error in reading !");
                }
                else
                {
                    FileStream stream = File.OpenWrite(fileName);
                    using (stream)
                    {
                        stream.Write(data, 0, data.Length);
                    }
                    Console.WriteLine("File written !");
                }

            }
        }
    }
}
 