using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using ServiceStack.Redis;
using ServiceStack.Redis.Generic;

namespace Ex2_Redis_Dictionary
{
    class Dictionary
    {
        

        static void Main(string[] args)
        {
            PooledRedisClientManager pool = new PooledRedisClientManager("nepipai@pub-redis-10333.us-east-1-4.1.ec2.garantiadata.com:10333");
            RedisClient redis = (RedisClient)pool.GetClient();
            var client = redis.As<string>();
            IRedisHash<String,String> hash = client.GetHash<string>("hashID");

            while (true)
            {
                PrintMenu();

                ProcessUserCommand(hash);
            }
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

        private static void ProcessUserCommand(IRedisHash<String,String> collection)
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

        static void ListAllWords(IRedisHash<String,String> collection )
        {
            var dict = collection.GetAll();
            Console.WriteLine("----------------------------");
            Console.WriteLine("Words in Dictionary:");
            Console.WriteLine("----------------------------");
            foreach (var entry in dict)
            {
                Console.WriteLine(entry.Key + ": "  + entry.Value);
            };
            Console.WriteLine("----------------------------");
        }

        static String Find(IRedisHash<String,String> collection, string parameter)
        {           
            var dictEntry = collection[parameter.Trim()];
            if (dictEntry == null)
            {
                dictEntry = "Not Found !";
            }

            return dictEntry;

        }

        static void Add(IRedisHash<String,String> collection, string[] parameters)
        {
            string word = parameters[0].Trim();
            string description = parameters[1].Trim();         
            collection.Add(word, description);
        }
    }
}
