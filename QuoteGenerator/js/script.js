/******************************************
Treehouse Techdegree:
FSJS project 1 - A Random Quote Generator
******************************************/




/*** 
  I've created the array of quote objects and I named it `quotes`.
  I've added five quote objects to the array,
  gave each quote object a `quote` and `source` property and added two 
  `year` and `citation` properties.

***/
let quotes = [
    {quote:'When I dare to be powerful – to use my strength in the service of my vision, then it becomes less and less important whether I am afraid.',
     source: 'Audre Lorde' 
    },
    {quote:'Those who dare to fail miserably can achieve greatly.',
     source: 'John F. Kennedy'
    },
    {quote:'Seek not happiness too greedily, and be not fearful of happiness.',
     source: 'Lao-Tzu'
    },
    {quote:'I felt despair. Though it seems to me now there\'s two kinds of it: the sort that causes a person to surrender and then the sort I had which made me take risks and make plans.',
     source: 'Erica Eisdorfer',
     year: 2009,
     citation:'The Wet Nurse\'s Tale'
    },
    {quote:'Self-regulation will always be a challenge, but if somebody\'s going to be in charge, it might as well be me.',
     source:'Daniel Akst', 
     year: 2011,
     citation:' We Have Met the Enemy: Self-Control in an Age of Excess', 
    }
]





/***
  The `getRandomQuote` function returns a random quote object from the 
     `quotes` array.
  
***/

function getRandomQuote (array) {
  let randomNumber = Math.floor(Math.random()*quotes.length);
  return array[randomNumber];


}


/***
  The `printQuote` function consists of the following: 
   - call to the `getRandomQuote` function and assigning it to a variable
   - uses the properties of the quote object stored in the variable to 
     create my own HTML string
   - uses conditionals to make sure the optional properties exist before 
     they are added to the HTML string.
   - sets the `innerHTML` of the `quote-box` div to the HTML string. 
***/

 function printQuote () {
  let print = getRandomQuote(quotes);
  let html;
  if (print.year && print.citation) {
    html = '<p class="quote">' + print.quote + '</p>' ;
    html += '<p class="source">' + print.source ;
    html +='<span class="citation">' + print.citation + '</span>';
    html += '<span class="year">' + print.year + '</span>';
    html +='</p>'
     
  } else {
    html = '<p class="quote">' + print.quote + '</p>' ;
    html += '<p class="source">' + print.source + '</p>' ;
  } 
 document.getElementById("quote-box").innerHTML=html; 

}


/***
  When the "Show another quote" button is clicked, the event listener 
  below will be triggered, and it will call the `printQuote` 
  function.
***/

document.getElementById('loadQuote').addEventListener("click", printQuote, false);


