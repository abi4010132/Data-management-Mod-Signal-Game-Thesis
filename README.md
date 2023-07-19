# Mod-Signal Game implementation

This repository contains the data and code to replicate the experiment and results of the bachelor's thesis named 'Human behaviour analysis of human-human and human-agent interactions in the Mod-Signal Game' by Abi Raveenthiran.
If you have any questions you can send an email to a.raveenthiran@student.rug.nl 

## Experiment setup

In my experiment a total of 21 participants played 3 blocks of the Mod-Signal Game, where each block lasted 20 rounds. After every block the participants were asked to fill in questionnaires regarding their strategy and their co-player's strategy. At the end of the experiment they were also asked to fill in a general questionnaire containing some general questions. The following subsections contain more information on how to replicate the experiment.

### Experiment design choices

Participants were seated in the same room separated by barriers. The barriers were used as a measure to prevent and discourage participants from looking at other participants' screen. The participants were also asked to put on headphones at the start of the experiment, this was done to make the mouse clicks less audible as the mouse clicks can be used to determine that they are playing with a human if the mouse clicks are followed by their game screen updating. A confederate was also present that pretended to play the Mod-Signal Game as a fourth participant. Since the Mod-Signal Game is a 2-player game and there are only 3 participants per session, the confederate is present to fool people into thinking that they are playing with a human when they are actually playing with the agent. To make sure that the participants are fooled, the confederate would pretend to play the game by clicking the mouse as well as pretend to fill in the questionnaires. To make sure this happened smoothly, the experimenter kept track of the agent and would message the confederate through whatsapp to notify them when they should start/stop clicking and when they should pretend to fill in the questionnaires.

### Running the game

Running the experiment can be done at [harmendeweerd.nl/research/mod/mod.html](https://harmendeweerd.nl/research/mod/mod.html) \
Here in the Game field, you can enter the ids of the 3 games to be played separated by a comma e.g. game1,game2,game3. Make sure that these values are unique and have not been used yet. \
Then in the Player ID field, the id of the player needs to be entered for each game separated by a comma. Here the player ID can be either 0, 1 or 3. If the player ID is 1 this means that the player starts signalling in the first round and if the player ID is 0, the player receives the signal in the first round. Player ID 3 is used when you want to let the agent play, the agent always starts as the signaler in the first round. Make sure that only two players join the game and that one player has ID 0 and the other player has ID 1 if it is a human or 3 if it should be the agent. \
In the tables below you can find an example of how I ordered the games and player IDs.
The first table contains which player ids the player should have in each block and the second table contains the game ids for each block, where X is the session number of the experiment.
For example, the input for the Game and Player ID fields for player 2 in session 1 of the experiment would be: \
| Game | s1_g12,s1_g24,s1_g23 |
| Player ID| 1,0,0 |
|  | Block 1 | Block 2 | Block 3 |
| --- | --- | --- | --- |
| Player 1 | 0 | 1 | 0 |
| Player 2 | 1 | 0 | 0 |
| Player 3 | 0 | 0 | 1 |
| Agent | 3 | 3 | 3 |

| Block 1 | Block 2 | Block 3 |
| --- | --- | --- |
| p1vp2: sX_g12 | p1vp3: sX_g13 | p2vp3: sX_g23 |
| p3vagent: sX_g34 | p2vsagent: sX_g24 | p1vagent: sX_g14 |

After filling in the fields you can press start and follow the instructions to play the game

### Documents

The documents that were used in the experiment can be found in the Documents folder of the repository. \
This folder contains: \
'Participant recruitment poster', the poster that I used to recruit the participants for the experiment. \
'Informed_consent', the informed consent formed that is to be filled in by the participants before the start of the experiment. \
'Questionnaire Block 1.pdf', the questionnaire that the participants fill in after block 1. \
'Questionnaire Block 2.pdf', the questionnaire that the participants fill in after block 2. \
'Questionnaire Block 3.pdf', the questionnaire that the participants fill in after block 3. \
'General Questionnaire.pdf', the questionnaire that the participants fill in after filling in 'Questionnaire Block 3'. \

### Code

The code for the html, css and javascript files can be found in ... \
There are no requirements to run this code as it can be run from the browser. \
It is recommended to run the experiment in FireFox as other browsers prompt an unnecessary download of data in the trial rounds before the first game of the experiment.

### Downloading the data

Everytime a number is played by a player data is appended to the online database. Therefore there will be 2 data entries per round of every game, one for the signaler and one for the responder. The data entries contain comma separated values of the game ID, round number, player ID, signalled number, chosen number and the reaction time for choosing the number. The data entries do not contain whether the player was signalling or not in that round, this has to be derived from the data itself. This is possible by looking at the round numbers and the player IDs, if the round numbere is uneven then player ID 1 or 3 is signalling, if the round number is even then player ID 0 is signalling. \

The data can be downloaded by going to [https://harmendeweerd.nl/research/mod/downloaddata.php](https://harmendeweerd.nl/research/mod/downloaddata.php) \


## Data analysis

### Data

#### Game data

The game data obtained in my experiment can be found in the Data folder.
game_data.php contains the raw data that was obtained from downloading the data. \
The data contains two entries per round of every game, one for the signaler and one for the responder.
The data contains comma separated values of the following columns: \
'game', the game ID. \
'round', the round number. \
'player', the playerID of the player. \
'signal', number that was signalled in that round. \
'action', number that the player chose that round. \
'reactiontime', time it took for the player to choose a number to play in milliseconds. \
\
From the data alone it is not possible to tell who the signaler or responder is in that round, this has to be derived by looking at the round numbers and player IDs. If the round number is uneven then the player ID 1 or 3 is signalling, if the round number is even then player ID 0 is signalling.

#### Questionnaire data

The data for the questionnaires can be found in the Data folder as well as the 'Questionnaires' folder.
The numerical values that could be extracted from the questionnaires have been compiled and sorted in the questionnaire_data.csv file.
This file contains comma separated values of the following columns: \
'Participant', this contains the participant ID in the format SXPY, where X is the number of the experiment session and Y is the player number given to the participant in that session. \
'P-beauty', contains the values (ranging from 0-100) entered in the p-beauty contest question by the participants. \
'B1 Coop', 'contains the cooperativeness ratings (ranging from 1-5) that the participants gave to their co-players of block 1. \
'B1 Competitive', 'contains the competitiveness ratings (ranging from 1-5) that the participants gave to their co-players of block 1. \
'B1 Competence', 'contains the competence ratings (ranging from 1-5) that the participants gave to their co-players of block 1. \
'B1 Again?', contains discrete values of -1 (no), 0 (neutral), 1 (yes) that represent whether they wanted to play again with their co-players of block 1. \
'B2 Coop', 'contains the cooperativeness ratings (ranging from 1-5) that the participants gave to their co-players of block 2. \
'B2 Competitive', 'contains the competitiveness ratings (ranging from 1-5) that the participants gave to their co-players of block 2. \
'B2 Competence', 'contains the competence ratings (ranging from 1-5) that the participants gave to their co-players of block 2. \
'B2 Again?', contains discrete values of -1 (no), 0 (neutral), 1 (yes) that represent whether they wanted to play again with their co-players of block 2. \
'B3 Coop', 'contains the cooperativeness ratings (ranging from 1-5) that the participants gave to their co-players of block 3. \
'B3 Competitive', 'contains the competitiveness ratings (ranging from 1-5) that the participants gave to their co-players of block 3. \
'B3 Competence', 'contains the competence ratings (ranging from 1-5) that the participants gave to their co-players of block 3. \
'B3 Again?', contains discrete values of -1 (no), 0 (neutral), 1 (yes) that represent whether they wanted to play again with their co-players of block 3. \
'B1 Human %', contains the percentage of how confident the participants were that they played with a human in block 1. \
'B2 Human %', contains the percentage of how confident the participants were that they played with a human in block 2. \
'B3 Human %', contains the percentage of how confident the participants were that they played with a human in block 3. \
'age', contains the age of the participants. \
'sex', contains the sex of the participants representend as M (male) and F (female). \

The filled in questionnaire papers of each participant can be found in the 'Questionnaires' folder. \
'Participants', this folder contains combined pdf files of the questionnaire data per participant. \
'Block 1', this folder contains the filled in block 1 questionnaires of each participant. \
'Block 2', this folder contains the filled in block 2 questionnaires of each participant. \
'Block 3', this folder contains the filled in block 3 questionnaires of each participant. \
'General', this folder contains the filled in general questionnaires of each participant. \

The files are named based on the participant ID in the format SXPY, where X is the number of the experiment session and Y is the player number given to the participant in that session. To track these answers back to the game_data you would have to backtrack using the tables found in Game Data.

### Analysis

The data analysis that was done in my thesis is found in the Data analysis folder. \
The contains R markdown files which are run separately. \
Make sure to run the first cells for data processing before running the other cells as the data processing differs per file depending on the analysis that is done within that file. \
signalDifferences.rmd contains graphs related to the signal/choice/response distribution and the choice/response - signal differences. \
honestyTrustRT.rmd contains graphs related to the honesty and trust levels of the participants as well as their reaction times. \
scores.rmd contains graphs related to the scores that the participants achieved in the games. \
questionnaire_analysis.rmd contains graphs regarding the questions that were asked in the questionnaires. \
statistical_tests.rmd contains the statistical tests that were performed in the analysis. \

To run the code make sure that the 'game_data.php' and 'questionnaire_data.csv' files are in the same folder as the code, for convenience I've added the data of my experiment in the data analysis folder.

