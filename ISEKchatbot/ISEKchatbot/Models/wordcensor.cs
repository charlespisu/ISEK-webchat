//------------------------------------------------------------------------------
// <auto-generated>
//    This code was generated from a template.
//
//    Manual changes to this file may cause unexpected behavior in your application.
//    Manual changes to this file will be overwritten if the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------

using System;
using System.Collections.Generic;

namespace ISEKchatbot.Models
{
    public partial class wordcensor
    {
        public int censor_id { get; set; }
        public string word_to_censor { get; set; }
        public string replace_with { get; set; }
        public string bot_exclude { get; set; }
    }
    
}
