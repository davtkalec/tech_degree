
const list = document.getElementsByClassName('student-item cf');



   const paginationDiv = document.createElement('div');
   paginationDiv.classList.add('pagination');
   const pageDiv = document.querySelector('.page');
   pageDiv.append(paginationDiv);

   const paginationUl = document.createElement('ul');
   paginationDiv.appendChild(paginationUl);

   
  


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

const appendPageLinks = (list) => {

   const numberOfPages = Math.ceil(list.length/10);

   for(let i = 0; i < numberOfPages; i++){

      const paginationLi = document.createElement('li');
      paginationUl.appendChild(paginationLi);
   

      const paginationAnchor = document.createElement('a');
      paginationAnchor.textContent = i+1;
      paginationLi.appendChild(paginationAnchor);
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

appendPageLinks(list,showPage(list,1));
   