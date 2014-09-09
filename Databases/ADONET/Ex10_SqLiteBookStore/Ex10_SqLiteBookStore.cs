using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data.SQLite;
using System.Globalization;

namespace Ex10_SqLiteBookStore
{
    class Ex10_SqLiteBookStore
    {
        static void Main(string[] args)
        {
            string connecionString = @"Data Source=..\..\BookStore.db;Version=3;New=True;";
            SQLiteConnection con = new SQLiteConnection(connecionString);
            con.Open();
            //intitializeDB(con);
            addBook(con,"Belite mechki","Iliqn K.","2012/12/30",4814431);
            listBooks(con);
        }
        private static void intitializeDB(SQLiteConnection con)
        {
            SQLiteCommand createDb = new SQLiteCommand(                           
                           "CREATE TABLE Authors " +
                           "(AuthorID INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, " +
                           "Name nvarchar(50) NOT NULL UNIQUE);" +
                           "CREATE TABLE Books " +
                           "(BookID INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, " +
                           "Title nvarchar(50), " +
                           "AuthorID INTEGER, " +
                           "PublishDate INTEGER, " +
                           "ISBN Bigint," +                          
                           "CONSTRAINT FK_Authors_Books FOREIGN KEY(AuthorID) References Authors(AuthorID));"
                          , con);
            int result = createDb.ExecuteNonQuery();
            String message = "";
          
            if (result == 1)
            {
                message = "Successifuly executed!";
            }
            else
            {
                message = "Error in SQL syntax!";
            }
            Console.WriteLine(message);
        }

        private static void listBooks(SQLiteConnection con)
        {
            SQLiteCommand listBooks = new SQLiteCommand(                           
                           "SELECT b.Title AS Title,b.PublishDate as 'Publish Date',b.ISBN AS ISBN, a.Name AS Name FROM books b " +
                           "JOIN authors a ON a.AuthorID = b.AuthorID ORDER BY Title; "
                          , con);
            String result = "";
            String message = "";
            var reader = listBooks.ExecuteReader();
            while (reader.Read())
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

        private static void addBook(SQLiteConnection con, string title, string author, string publishDate, long ISBN)
        {
            SQLiteCommand addBook = new SQLiteCommand(
                          "INSERT INTO authors (AuthorID,Name) values(NULL,@author); " +
                          "INSERT INTO books (BookID,Title,AuthorID,PublishDate,ISBN) values (NULL,@title, last_insert_rowid(),@publishDate,@ISBN) ", con);
            addBook.Parameters.AddWithValue("@author", author);
            addBook.Parameters.AddWithValue("@title", title);          
            addBook.Parameters.AddWithValue("@publishDate", publishDate);
            addBook.Parameters.AddWithValue("@ISBN", ISBN);

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
        private static void findBook(SQLiteConnection con, string title)
        {
            SQLiteCommand addBook = new SQLiteCommand(
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
