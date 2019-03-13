class Game {
    constructor() {
        this.board = new Board();
        this.players = this.createPlayers();
        this.ready = false;
    }


    get activePlayer() {
        return this.players.find(player => player.active); //returns the first instead of all
    }


    /** 
 * Creates two player objects
 * @return  {Array}    An array of two Player objects.
 */

    createPlayers() {
        const players = [ new Player('Player 1',1, '#e15258',true),
                          new Player('Player 2',2,'#e59a13')]; //default value
         return players;                 
    }

    /** 
    * Initializes game. 
    */
    startGame() {
        this.board.drawHTMLBoard();
        this.activePlayer.activeToken.drawHTMLToken();
        this.ready = true;
    }

    
}