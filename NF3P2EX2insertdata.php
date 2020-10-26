<?php
// connect to mysqli
$db = mysqli_connect(gethostname(), 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

//make sure you're using the correct database
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));

// insert data into the movie table
$query = 'INSERT INTO movie
        (movie_id, movie_name, movie_type, movie_year, movie_leadactor,
        movie_director)
    VALUES
        (4, "Pelicula de zombis", 9, 2018, 1, 2),
        (5, "Pelicula de artes marciales", 10, 2017, 3, 4),
        (6, "Pelicula de supervivencia", 11, 2019, 5, 6)';
mysqli_query($db,$query) or die(mysqli_error($db));

// insert data into the movietype table
$query = 'INSERT INTO movietype 
        (movietype_id, movietype_label)
    VALUES 
        (9, "Zombis"),
        (10, "Artes Marciales"),
        (11, "Supervivencia")';
mysqli_query($db,$query) or die(mysqli_error($db));

// insert data into the people table
$query  = 'INSERT INTO people
        (people_id, people_fullname, people_isactor, people_isdirector)
    VALUES
        (7, "Vin Diesel", 1, 0),
        (8, "Fernando Alonso", 1, 0),
        (9, "Leo Messi", 0, 1)';
mysqli_query($db,$query) or die(mysqli_error($db));

echo 'Data inserted successfully!';
?>