# You Can Do It - Riot Games API Challenge 2016

- By (Ahmed Safadi - SKT T1 FEED3R(EUW) & Mohammed Awad - Aza3em(EUW)

## General Information

This project is an entry for the [Riot Games API Challenge 3](https://developer.riotgames.com/discussion/announcements/show/eoq3tZd1).

You can find a demo [here](http://wadymasr.com/YouCanDoIt/)
or you can watch this video [here](https://www.youtube.com/watch?v=--K_mVtt0zg)

I've played more than 1,000 games with Teemo,, I'm scared from this player, what should i do !! ,,  from here the idea has grow up , the project is that we provide you with experts palyers to evaluating the other players with the selected champion , according to statistics and official figures that provided from riot games company.

Well what make this project is special that we give you the stats with intresting  way , it's like that we can make you feel that there is really someone talk to you :) ,, we are talking here about ( Artificial intelligence ) ... ^^" , the project it self can judge if this player is good with champion or not :/ << how you do that ,, more info in the Documentation file ,,

what we want from you only 3 thing ( Your Summoner Name , Your Region , The Champion ) and the rest to us ;)

## Requirements
Webserver with
- PHP 5.4+
- MySQL 5.6.12

## Setup
- Configure [connection.php](connection.php) with the username, password, database for your installation
- Create the database with the [sql-file](sql/Riot3.sql)
- [OPTIONAL] You can change the expert or add new expert from the database
- Open the [index.php](index.php) in your browser ;)

## Technologies used
- JavaScript
- Php
- Ajax & Jquery

## How You Can Judge Me !?
- First from the previous projects [AP Arena](https://github.com/TiFu/RiotGamesAPIChallenge2) and [URF Match overview/statistics ](https://github.com/SkilledGod/URFMatchOverview)
- i saved alot of good average that help me today to generate function to judge if you are good or bad.

## Values & Functions

Static Values

| Name  |
|---|
| Aggressive  |
| Balanced  |
| Beginner  |

Functions

- KDA Function ( 30 Points )
- 
| Name  | Min  | Max  | Judge |
| --- | --- | --- | --- |
| Perfect | 3 | +3 | Aggressive |
| Normal | 2 | +3 | Balanced |
| Bad | 0 | +2 | Beginner |

- Champion Grade Function ( 30 Points )
- 
| Name  | Min  | Max  | Judge |
| --- | --- | --- | --- |
| Boosted | 0 | 10 | Beginner |
| Very Bad | 10 | 35 | Beginner |
| Bad | 35 | 50 | Balanced |
| Very Good | 51 | 60 | Balanced |
| Excellent | 60 | 80 | Aggressive |
| Perfect | 80 | +80 | Aggressive |

- Top 3 Champion Mystery ( 25 Points )
- 
| Name  | Min  | Max  | Judge |
| --- | --- | --- | --- |
| Perfect | 1 | 3 | Aggressive |
| Normal | 3 | 6 | Balanced |
| Bad | 6 | +6 | Beginner |

- Farms Function ( 5 Point )
- 
| Name  | Min  | Max  | Judge |
| --- | --- | --- | --- |
| Perfect | 180 | +180 | Aggressive |
| Normal | 100 | 179 | Balanced |
| Bad | 0 | 100 | Beginner |


- Golds Function ( 5 Point )
- 
| Name  | Min  | Max  | Judge |
| --- | --- | --- | --- |
| Perfect | 10000 | +10000 | Aggressive |
| Normal | 8000 | 10000 | Balanced |
| Bad | 0 | 8000 | Beginner |

- Turret Function ( 5 Point )
- 
| Name  | Min  | Max  | Judge |
| --- | --- | --- | --- |
| Perfect | 1.0 | +1.0 | Aggressive |
| Normal | 0.5 | 1.0 | Balanced |
| Bad | 0 | 0.5 | Beginner |

