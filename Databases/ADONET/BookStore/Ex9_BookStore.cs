using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data.MySqlClient;
using System.Globalization;

namespace Ex9_BookStore
{
    class Ex9_BookStore
    {

        static void Main(string[] args)
        {
            String connectionString = "Server=localhost; Port=3306; Database=world; Uid=root; Pwd= ; pooling=true";
            MySqlConnection con = new MySqlConnection(connectionString);
            con.Open();
            findBook(con, "Gary Kasparov");
        }

        private static void intitializeDB(MySqlConnection con)
        {
            MySqlCommand createDb = new MySqlCommand(
                           "CREATE DATABASE BookStore; " +
                           "USE BookStore; " +
                           "CREATE TABLE Authors " +
                           "(AuthorID INT NOT NULL AUTO_INCREMENT, " +
                           "Name nvarchar(50) NOT NULL, " +
                           "PRIMARY KEY(AuthorID),"+
                           "UNIQUE(Name));" +
                           "CREATE TABLE Books " +
                           "(BookID INT NOT NULL AUTO_INCREMENT, " +
                           "Title nvarchar(50), " +
                           "AuthorID INT, " +
                           "PublishDate DateTime, " +
                           "ISBN Bigint,"+
                           "PRIMARY KEY(BookID), " +
                           "CONSTRAINT FK_Authors_Books FOREIGN KEY(AuthorID) References Authors(AuthorID),"+
                           "UNIQUE(Title));"
                          , con);
            int result = createDb.ExecuteNonQuery();
            String message = "";
            if(result==1) {
                message = "Successifuly executed!";
            }else {
                message = "Error in SQL syntax!";
            }
            Console.WriteLine(message);
        }

        private static void listBooks(MySqlConnection con)
        {
            MySqlCommand listBooks = new MySqlCommand(                           
                           "USE BookStore; " +
                           "SELECT b.Title AS Title,b.PublishDate as 'Publish Date',b.ISBN AS ISBN, a.Name AS Name FROM books b " +
                           "JOIN authors a ON a.AuthorID = b.AuthorID ORDER BY Title; " 
                          , con);
            String result = "";
            String message = "";
            var reader = listBooks.ExecuteReader();
            while(reader.Read())
            {
                result = result + "\nTitle: " + reader["Title"] +
                    ", Publish Date: " + reader["Publish Date"] + 
                    ", ISBN: " + reader["ISBN"] + ",Author: " +
                    reader["Name"];
            }
            
            if (result != "")
            {
                Console.WriteLine(result);
                Console.WriteLine();
                message = "Successifuly executed!";
            }
            else
            {
                message = "Error in SQL syntax!";
            }
            Console.WriteLine(message);
        }
        private static void addBook(MySqlConnection con,string title,string author,DateTime publishDate,long ISBN)
        {
            MySqlCommand addBook = new MySqlCommand(
                          "USE BookStore;" +
                          "INSERT INTO authors (AuthorID,Name) values(NULL,@author); " +
                          "INSERT INTO books (BookID,Title,AuthorID,PublishDate,ISBN) values (NULL,@title,last_insert_id(),@publishDate,@ISBN) ", con);
            addBook.Parameters.AddWithValue("@author", author);
            addBook.Parameters.AddWithValue("@title",title);
            if (publishDate == null)
            {
                string defaultDate = "1900-01-01 12:00";
                publishDate = DateTime.ParseExact(defaultDate, "yyyy-MM-dd HH:mm", CultureInfo.InvariantCulture);
            }
            addBook.Parameters.AddWithValue("@publishDate", publishDate);
            addBook.Parameters.AddWithValue("@ISBN",ISBN);

            int result = addBook.ExecuteNonQuery();
            string message = "";

            if (result != -1)
            {
               
                message = "Book successifuly added!";
            }
            else
            {
                message = "Error in SQL syntax!";
            }
            Console.WriteLine(message);

        }
        private static void findBook(MySqlConnection con, string title)
        {
            MySqlCommand addBook = new MySqlCommand(
                "USE BookStore; " +
                "SELECT b.Title AS Title,b.PublishDate as 'Publish Date',b.ISBN AS ISBN, a.Name AS Name FROM books b " +
                    "JOIN authors a ON a.AuthorID = b.AuthorID WHERE Title LIKE CONCAT('%',@title,'%') ", con);
            addBook.Parameters.AddWithValue("@title", title);
            string result = null;
            string message = "";
            var reader = addBook.ExecuteReader();
           
            while (reader.Read())
            {
                result = "\nTitle: " + reader["Title"] +
                    ", Publish Date: " + reader["Publish Date"] +
                    ", ISBN: " + reader["ISBN"] + ",Author: " +
                    reader["Name"];
            }

            if (result != null)
            {
                message = result;
            }
            else
            {
                message = "Book not found!";
            }
            Console.WriteLine(message);
        }
    }

}
