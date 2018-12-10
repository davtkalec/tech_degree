/******************************************
Treehouse Techdegree:
FSJS project 1 - A Random Quote Generator
******************************************/

// Study guide for this project - https://drive.google.com/file/d/1s5grutGuQFwJcQP8bFwEI69Q8FCkGdDk/view?usp=sharing


/*** 
  Create the array of quote objects and name it `quotes`.
  Add at least five quote objects to the `quotes` array.
  Give each quote object a `quote` and `source` property.

  Recommended: 
    - Add at least one `year` and/or `citation` property to at least one 
      quote object.
***/
let quotes = [
    {quote:'When I dare to be powerful – to use my strength in the service of my vision, then it becomes less and less important whether I am afraid.',
     source: '-Audre Lorde' 
    },
    {quote:'Those who dare to fail miserably can achieve greatly.',
     source: '-John F. Kennedy'
    },
    {quote:'I felt despair. Though it seems to me now there\'s two kinds of it: the sort that causes a person to surrender and then the sort I had which made me take risks and make plans.',
     source: '-Erica Eisdorfer',
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
  Create the `getRandomQuote` function to:
   - generate a random number 
   - use the random number to `return` a random quote object from the 
     `quotes` array.
***/

function getRandomQuote (array) {
  let randomNumber = Math.floor(Math.random()*quotes.length);
  return array[randomNumber];


}

//console.log(getRandomQuote(quotes));
/***
  Create the `printQuote` function to: 
   - call the `getRandomQuote` function and assign it to a variable.
   - use the properties of the quote object stored in the variable to 
     create your HTML string.
   - use conditionals to make sure the optional properties exist before 
     they are added to the HTML string.
   - set the `innerHTML` of the `quote-box` div to the HTML string. 
***/

 function printQuote () {
  let print = getRandomQuote(quotes);
  let html;
  if (print.year || print.citation) {
    html = '<p class="quote">' + print.quote + '</p>' ;
    html += '<p class="source">' + print.source ;
    html +='<span class="citation">' + print.citation + '</span>';
    html += '<span class="year">' + print.year + '</span>';
    html +='</p>'
     
  } else {
    html = '<p class="quote">' + print.quote + '</p>' ;
    html += '<p class="source">' + print.source + '</p>' ;
  }

  //html += '<div style="quote-box:' + html + '"></div>';
 document.getElementById("quote-box").innerHTML=html;
   
  

}
//console.log(printQuote());

/***
  When the "Show another quote" button is clicked, the event listener 
  below will be triggered, and it will call, or "invoke", the `printQuote` 
  function. So do not make any changes to the line of code below this 
  comment.
***/

document.getElementById('loadQuote').addEventListener("click", printQuote, false);


// Remember to delete the comments that came with this file, and replace them with your own code comments.