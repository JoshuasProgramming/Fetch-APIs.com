//Api key https://api.themoviedb.org/3/movie/550?api_key=705b3276eaab818976e45618bf036919

const image1 = document.getElementById('image1');
image1.style.visibility = "hidden";

const movie_image_title = document.getElementById('movie_image_title');

const random_movie_btn = document.getElementById('random_movie_btn').addEventListener("click",(e)=>{

    let random_move_id = Math.floor(Math.random() * 996); //550

    let url = ("https://api.themoviedb.org/3/movie/" + random_move_id + "?api_key=705b3276eaab818976e45618bf036919");

    /**
     * 1.Fetch the url of the covid 19 data
     * 2.Send a response in json
     * 3.output the json in the console
     */


    fetch(url)
    .then(response => response.json())
    .then(data => { //.then(data => console.log(data));
        //console.log(data);
        if(data.backdrop_path == undefined){
            image1.style.visibility = "hidden";
            movie_image_title.innerText = "";

        } else if(data.backdrop_path !== undefined){

            image1.style.visibility = "visible";
            image1.src = "https://www.themoviedb.org/t/p/original" + data.backdrop_path;
            movie_image_title.innerText = "Title: " +data.original_title;
        }
        
    }); 
});
