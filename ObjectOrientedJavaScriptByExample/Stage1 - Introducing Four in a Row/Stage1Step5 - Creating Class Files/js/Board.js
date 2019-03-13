class Board {
    constructor(){ // no arguments passed 'cause the game has only one board per game, staticly passing rows and columns
        this.rows = 6;
        this.columns = 7;
        this.spaces = createSpaces();
    }

    /** 
 * Generates 2D array of spaces. 
 * @return  {Array}     An array of space objects
 */
    createSpaces(){
          //creator method,the Space objects all belong to the Board, and are stored inside a property on the Board object. That's why they are created inside the Board class
       const spaces = [];
       
          for(let x = 0; x < this.columns; x++) {
              const col = [];

              for (let y = 0; y < this.rows; y++) {
                  const space = new space(x,y);
                  col.push(space);
              }
              spaces.push(col);
          }
          return spaces; 
    }

    drawHTMLBoard(){
        for (let column of this.spaces){ //for each eement of the array
            for(let space of column) {
                space.drawSVGSpace();
            }
        }
    }
}