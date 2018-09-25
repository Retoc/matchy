@extends('layouts.default')

@section('content')
    <div class = "container">

        @php
            echo "<h1> Fixtures - {$fromDate} - {$toDate} </h1>";

            if(isset($fixtures)) {
                if(count($fixtures) >= 2) {
                    $last_league_id = 0;
                    foreach($fixtures as $fixture) {
                        $league = $fixture->league->data;
                        $homeTeam = $fixture->localTeam->data;
                        $awayTeam = $fixture->visitorTeam->data;
                        if($fixture->league_id == $last_league_id) {
                            echo "<tr>";
                                echo "<td>" . $homeTeam->name . "</td>";
                                echo "<td>" . $awayTeam->name . "</td>";
                                echo "<td>" . $fixture->id . "</td>";
                                echo "<td scope='row'>" . $fixture->scores->ft_score . "</td>";
                                echo "<td scope='row'>" . $fixture->time->starting_at->date_time . "</td>";
                            echo "</tr>";
                        } else {
                            echo "<table class='table table-responsive' width='100%'>";
                                echo "<br><h3>" . $league->name . "</h3>"; // add link to league-details page
                                echo "<thead class='thead-light'>";
                                    echo "<tr>";
                                        echo "<th scope='col'>Home team</th>";
                                        echo "<th scope='col'>Away team</th>";
                                        echo "<th scope='col'>Result</th>";
                                        echo "<th scope='col'>Date and time</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                    echo "<tr>";
                                        echo "<td>" . $homeTeam->name . "</td>";
                                        echo "<td>" . $awayTeam->name . "</td>";
                                        echo "<td>" . $fixture->id . "</td>";
                                        echo "<td scope='row'>" . $fixture->scores->ft_score . "</td>";
                                        echo "<td scope='row'>" . $fixture->time->starting_at->date_time . "</td>";
                                    echo "<tr>";
                        }
                        $last_league_id = $fixture->league_id;
                    }
                }
            }
        @endphp

    </div>
@endsection