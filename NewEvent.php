<?php
/*ask wether the person wants to register in the name of club or in the name of individual
	
	if individual 
		then follow the normal procedure of taking the values like
		1.Name of the event
		2.Price of the event
		3.Total seats of the event

		then, take the username and password from the person in the name of the that individual event

		event and event's details(name,disc,.etc) -> `events` table
		
		get the event's id from the `events` table

		now place: 
		username,password,individual_id(of the event),club_id(by default 0) -> `event_cord_login` table

		and place 
		event's id in -> `individual_event_ids` table

		-----X---X---X-----      //done(making tables is remaining)

	else(if club) 
		now,show him all the clubs existing so far from `club_names` table 

		if his club exists
			then

			the selected club id is taken from the given list

			event and event's details(name,disc,.etc) -> `events` table
			
			get the event's id from the `events` table
			
			update the no_of_events+=1 in `club_names`

			and place 
			club_id,event's id in -> `club_maps_event_ids` table(for displaying the events in the co-ordinator login)

		else (if new club then)
			then,
			take the total_logins count and total_events count but dnt insert the total_logins and the total_events 
			in the database

			take the name of the club,total_logins(default 0),total_events(default 0) and insert into -> `club_names`
			
			get the selected club's id from `club_names`

			run a loop to diplay all the logins required and take the input of all the usernames and passwords and store it in 
			`event_cord_login` table by setting the default value of individual_id as 0
			and increasing the total_logins+=1 in `club_names` for that respective club's id

			run a loop to display the details of all the required details of the events

			then follow the normal procedure of taking the values like
			1.Name of the event
			2.Disc of the event
			3.Price of the event
			4.Total seats of the event
			
			event and event's details(name,disc,.etc) -> `events` table
		
			get the event's id from the `events` table

			update the no_of_events+=1 in `club_names`

			and place 
			club_id,event's id in -> `club_maps_event_ids` table(for displaying the events in the co-ordinator login)
			---------X----X-----X---------
*/

/*
--------------------------If any changes in the 2nd or 3rd step like taking username or creating event is being undone then
--------------------------All the changes done so far must be changed accordingly
*/
		session_start();
		if((isset($_SESSION["password"]))&&(isset($_REQUEST["key"])))
		{
			require 'sql_con.php';
			echo "<div id='display'>";
			echo "<input type = 'radio' name ='choose' id ='individual' onclick='selected_individual(this.id);' style='position:absolute;top:100px;left:300px;width:20px;height:20px;' value = 0><p style='position:absolute;top:80px;left:340px;font-size:20px;'>Individual</p>
				  <input type = 'radio' name ='choose' id ='club' onclick='selected_club(this.id);' style='position:absolute;top:150px;left:300px;width:20px;height:20px;' value = 1><p style='position:absolute;top:130px;left:340px;font-size:20px;'>Club</p>";
			echo "</div>";
			mysqli_close($mysqli);
		}
		else if(((!isset($_SESSION["password"]))&&(!isset($_REQUEST["key"])))||((isset($_SESSION["password"]))&&(!isset($_REQUEST["key"]))))
		{
			session_unset();
			header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
			header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
			session_destroy();
			header("Location:login.php");
		}
	
		else
		{
			session_unset();
			header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
			header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
			session_destroy();
			echo "<div>Please login again</div>";
			exit();
		}
?>