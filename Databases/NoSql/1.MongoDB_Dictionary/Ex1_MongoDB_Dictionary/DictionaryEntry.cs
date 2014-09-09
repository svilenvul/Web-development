using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MongoDB.Bson;
using MongoDB.Driver;
using MongoDB.Driver.Builders;
using MongoDB.Bson.Serialization.Attributes;

namespace Ex1_MongoDB_Dictionary
{
    public class DictionaryEntry
    {
        [BsonId]
        public string Name { get; set;}
        public string Description{get; set;}

        public DictionaryEntry(string name, string description)
        {
            this.Name = name;
            this.Description = description;
        }

        public override string ToString()
        {
            return "(" + this.Name + ": " + this.Description + ")";
        }
    }
}
