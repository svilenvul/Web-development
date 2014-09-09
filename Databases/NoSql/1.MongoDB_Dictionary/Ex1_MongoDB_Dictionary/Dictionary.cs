using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MongoDB;
using MongoDB.Driver;
using MongoDB.Driver.Builders;

namespace Ex1_MongoDB_Dictionary
{ 
    class Dictionary
    {
        static string connString = "mongodb://admin:nepipai@ds055689.mongolab.com:55689/dictionary";

        static void Main(string[] args)
        {
            var db = connectToDB();    
            Console.WriteLine("Succsessifuly connected to database.");
            var collection = db.GetCollection<DictionaryEntry>("words");
           
            while (true)
            {
                PrintMenu();

                ProcessUserCommand(collection);
            }
        }

        static dynamic connectToDB()
        {            
            var client = new MongoClient(connString);
            var server = client.GetServer();
            var database = server.GetDatabase("dictionary");
            return database;
        }

        static void ListAllWords (MongoCollection<DictionaryEntry> collection)
        {
            var allWords = collection.FindAll();

            Console.WriteLine("Words in Dictionary:");
            foreach (var word in allWords)
            {
                Console.WriteLine(word);
            };
        }

        static DictionaryEntry Find(MongoCollection<DictionaryEntry> collection, string parameter)
        {
            var query = Query<DictionaryEntry>.EQ(e => e.Name, parameter);
            DictionaryEntry foundWord = collection.FindOne(query);
            return foundWord;

        }

        static void Add(MongoCollection<DictionaryEntry> collection, string [] parameters)
        {
            string word = parameters[0];
            string description = parameters[1];
            var newWord = new DictionaryEntry(word, description);
            collection.Insert(newWord);
        }

        private static void PrintMenu()
        {
            Console.WriteLine("----------------------------");
            Console.WriteLine("Command List:"); 
            Console.WriteLine("-show : Shows all items in the dictionary"); 
            Console.WriteLine("-add : Adds a new word with the description given in the dictionary."); //Read
            Console.WriteLine("-search : Searches for a word in the dictionary.");
            Console.WriteLine("----------------------------");
            Console.WriteLine();
        }

        private static void ProcessUserCommand( MongoCollection<DictionaryEntry> collection)
        {
            string command = Console.ReadLine();

            if (command == "-show")
            {
                ListAllWords(collection);
            }
            else if (command == "-add")
            {
                Console.WriteLine("Please type word and meaning separated by - !");
                string[] parameters = Console.ReadLine().Split('-');
                Add(collection, parameters);
                ListAllWords(collection);
            }
            else if (command == "-search")
            {
                Console.WriteLine("Please type word.");
                string parameter = Console.ReadLine();
                var foundWord = Find(collection, parameter);
                Console.WriteLine(foundWord);
                ListAllWords(collection);
            }
            else
            {
                Console.WriteLine("Unknown command !");
            }
            
        }
    }
}
