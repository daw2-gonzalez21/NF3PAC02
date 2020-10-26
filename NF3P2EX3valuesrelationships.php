<?php
$db = mysqli_connect(gethostname(), 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));

// select the movie titles and their genre after 1990
$query = 'SELECT
        m.movie_name, p.people_fullname
        FROM
        movie m, people p
    WHERE
        m.movie_leadactor = p.people_id';
$query2 = 'SELECT
        m.movie_name, p.people_fullname
        FROM 
        people p, movie m
        WHERE
        m.movie_director = p.people_id';
$result = mysqli_query($db,$query) or die(mysqli_error($db));
$result2 = mysqli_query($db,$query2) or die(mysqli_error($db));

// show the results
echo 'Nombres de los directores: <br>';
while ($row = mysqli_fetch_assoc($result2)) {
    extract($row);
	echo $movie_name. ' - ' . $people_fullname . '<br>';
}
echo 'Nombres de los leadactors: <br>';
while ($row = mysqli_fetch_assoc($result)) {
    extract($row);
	echo $movie_name. ' ' . '-' . ' '. $people_fullname . '<br>';
}

?>