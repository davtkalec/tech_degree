/* Declared all the global variables, appended the pagination Div and a Ul to the .page Div 
*/
const list = document.getElementsByClassName('student-item cf');



   const paginationDiv = document.createElement('div');
   paginationDiv.classList.add('pagination');
   const pageDiv = document.querySelector('.page');
   pageDiv.append(paginationDiv);

   const paginationUl = document.createElement('ul');
   paginationDiv.appendChild(paginationUl);

   
  

/*
function showPage, it loops through the list items and checks if the first item on the page is >= then the first element on the list,
and if the last item on the page is <= then the last element on the list, displays 10 elements depending on which page we've selected
and hides the rest

*/
const showPage = (list,page) => {
   page *=10;
   const firstItemOnPage = (page - 10);
   const lastItemOnThePage = (page - 1);
   
   for ( let i = 0; i < list.length; i++) {
      if(i >= firstItemOnPage && i <= lastItemOnThePage ) {
            list[i].style.display = '' ;
   }  else { 
      list[i].style.display = 'none';
   }
   }
}

/*
function appendPageLinks generates and appends 'li' and 'a' elements on the pagination Div, on 'click' it removes
the active class from the 'a' elements and gives the clicked 'a' link the active class
*/
const appendPageLinks = (list) => {

   const numberOfPages = Math.ceil(list.length/10);

   for(let i = 0; i < numberOfPages; i++){

      const paginationLi = document.createElement('li');
      paginationUl.appendChild(paginationLi);
   

      const paginationAnchor = document.createElement('a');
      paginationAnchor.textContent = i+1;
      paginationLi.appendChild(paginationAnchor);
      if (paginationAnchor.textContent == 1){
         paginationAnchor.className = 'active';
      }
   }
   

      
      paginationDiv.addEventListener('click', (e) => {
         
         const a = document.querySelectorAll('.pagination li a');
         for(let i = 0; i < a.length; i++) {
           a[i].classList.remove('active') ;
     }

                const pageNumber = e.target.textContent;
                event.target.className='active';
                showPage(list,pageNumber);
               
         
    });
}

/*call to the appendPageLinks function, passing the list of students, 
and a call to the showPage function with the list of the students and page value of 1
because I want the first page, the page with the first ten students show at the initial load
*/
appendPageLinks(list,showPage(list,1));
   