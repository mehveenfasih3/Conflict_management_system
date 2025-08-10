<?php
 
 session_start(); 
 require 'includes/dbconfig.inc.php';
  if(!$_SESSION['logged']){ 
      header("Location: login/login.php"); 
      exit; 
  }
// Get the logged-in user ID
$userid = $_SESSION['userid'];

?>
<!doctype html>
<html>
<head>
          
    <title>Conflict Management</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta charset="UTF-8">
    <style>
        #divRadioSrc {
            display: none;
        }
    </style>

    <link href="css/templatemo_style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="main-container">
        <nav class="main-nav" style="padding-bottom: 0px;">
            <div id="logo" class=""><a href="#">Conflict Management</a></div>
            <br>
            <h1 style="margin-bottom: 0;float: left;margin-left: 25px;">Conflict between peers</h1>
            <ul class="nav right center-text" style="margin-top: -10px;">
                <li class="btn"><a href="indexmain.html">Home</a></li>
                <li class="btn"><a href="index.html">Back</a></li>
            </ul>
        </nav>
        <div class="content-container">
            <header>
                <!--<h1 class="center-text">Conflict with the manager</h1>-->
            </header>

            <div id="templatemo-detail content">
                <div style="margin-bottom:20px;">
                <div id="Div4" style="margin-left:-1em;float:left;">
                        <video id="video3" src="videos\main\sim3movs\RCS3C001.mp4" width="300" height="170"  type="video/mp4"></video>
                    </div>
                    <div id="Div1" style="margin-left:-6em;float: left;">
                        <video id="video1" src="videos\main\sim3movs\RCS3B001.mp4" width="300" height="170" autoplay type="video/mp4"></video>
                    </div>
                    <div id="Div2" style="margin-left:-6em;float:left;">
                        <video id="video2" src="videos\main\sim3movs\RCS3A001.mp4" width="300" height="170"  type="video/mp4"></video>
                    </div>
                    
                    <div id="Div3" style="background-color: orange;float: right;width: 300px;margin-right: 110px;margin-top:0em;">
                        <div id="buttonSpeakContainer" style="text-align: center;background-color: yellow;"><input type="button" name="speak" value="Speak" style="color:black;background-color: orange;" id="speak" /></div>
                        <div style="clear:both"></div>
                    </div>
                    
                    <div style="clear:both"></div>
                </div>
                <div style="width: 97%;height: 30px;background-color: black;margin-left: 1%;padding: 10px;">
                    <div style="float: left;">
                        <div style="width: 20px;height: 20px;margin-top: 6px;border-radius: 50%;background-color: green;float: left;margin-right: 5px;" class="green color_feed green_feed"></div>
                        <div style="width: 20px;height: 20px;margin-top: 6px;border-radius: 50%;background-color: orange;float: left;margin-right: 5px;" class="yellow color_feed yellow_feed"></div>
                        <div style="width: 20px;height: 20px;margin-top: 6px;border-radius: 50%;background-color: red;float: left;margin-right: 5px;" class="red color_feed red_feed"></div>
                    </div>
                    <div style="float: left;margin-left: 10px;">
                        <div id="feedback_text">feedback</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="divRadioSrc">
        <div id="1a" class="major_div"><input type="radio" id="1a1" name="select" value="video2~RCS3A002.mp4" text-color="red" feed_txt="You are establishing a time frame which does not allow for additional discussion time if it is needed." video-ids="2a,2b,2c">This will only take about half an hour. I have another meeting this afternoon, so we need to have things wrapped up fairly soon.</div>
            <div id="1b" class="major_div"><input type="radio" id="1b1" name="select" value="video2~RCS3A001.mp4" text-color="yellow" feed_txt="Although you are allowing for additional time to be used, you need to establish a time frame for meeting. " video-ids="2a,2b,2c">I really can’t give you a definite answer. We’ll be here as long as it takes to thoroughly resolve this issue.</div>
            <div id="1c" class="major_div"><input type="radio" id="1c1" name="select" value="video2~RCS3A001.mp4" text-color="green" feed_txt="You are allowing time to address the conflict and encouraging open discussion. " video-ids="2a,2b,2c">I’ve allotted approximately half an hour for this meeting, but well use additional time if its needed. I want to make sure we discuss this matter thoroughly.</div>
            
            
           
            <div id="2a" class="major_div"><input type="radio" id="2a1" name="select" value="video2~RCS3A003.mp4;video1~RCS3B002.mp4" text-color="green" feed_txt="You are encouraging open discussion and addressing concerns of employees." video-ids="3a,3c,3b,3d">As you all know , we need to discuss the possible introduction of a credit card for our customers. I believe there has been some debate regarding the practicality of this idea.</div>
            <div id="2b" class="major_div"><input type="radio" id="2b1" name="select" value="video2~RCS3A003.mp4;video1~RCS3B002.mp4" text-color="red" feed_txt="You need to request feedback from team members." video-ids="3a,3c,3b,3d">As you all know we need to discuss the credit card situation</div>
            <div id="2c" class="major_div"><input type="radio" id="2c1" name="select" value="video2~RCS3A003.mp4;video1~RCS3B002.mp4" text-color="yellow" feed_txt="You are addressing team member concerns but failing to request feedback." video-ids="3a,3c,3b,3d">As each one of you knows, there has some debate regarding the introduction of credit cards for our customers.</div>

           
            <div id="3a" class="major_div"><input type="radio" id="3a1" name="select" value="video2~RCS3A005.mp4" text-color="red" feed_txt="You are failing to address the  concerns of the team members." video-ids="4a,4b,4c">Jim, I’m sure the situation isn’t as bad as you’re making it out to be.</div>
            <div id="3b" class="major_div"><input type="radio" id="3b1" name="select" value="video2~RCS3A005.mp4" text-color="yellow" feed_txt="You are requesting feedback, but not effectively addressing the team members concern." video-ids="4a,4b,4c">Jim, you don’t think the situation is that bad, don’t you?</div>
            <div id="3c" class="major_div"><input type="radio" id="3c1" name="select" value="video2~RCS3A004.mp4" text-color="green" feed_txt="You are fostering an environment which is conductive to the open expression of thoughts and concerns." video-ids="4a,4b,4c">Patricia, just a second. Let’s let Jim finish his thought. I want to know each of your concerns regarding the issue.</div>
            <div id="3d" class="major_div"><input type="radio" id="3d1" name="select" value="video2~RCS3A004.mp4" text-color="green" feed_txt="You are encouraging the team members to express their thoughts." video-ids="4a,4b,4c">What do you mean, Jim? Do you feel like other teams in our division don’t support this project?</div>
           

            <div id="4a" class="major_div"><input type="radio" id="4a1" name="select" value="video2~RCS3A006.mp4;video1~RCS3B003.mp4" text-color="red" feed_txt="You are demonstrating no concern for the team members viewpoint." video-ids="5a,5b,5c,5d">Jim, don’t you think you’re exaggerating a little?</div>
            <div id="4b" class="major_div"><input type="radio" id="4b1" name="select" value="video2~RCS3A006.mp4;video1~RCS3B003.mp4" text-color="green" feed_txt="Good. You are clarifying the viewpoints of the team members to encourage understanding." video-ids="5a,5b,5c,5d">Jim, what exactly has made you feel like the credit card project isn’t supported?</div>
            <div id="4c" class="major_div"><input type="radio" id="4c1" name="select" value="video2~RCS3A006.mp4;video1~RCS3B003.mp4" text-color="red" feed_txt="You are failing to request feedback from the team members." video-ids="5a,5b,5c,5d">Jim, I’m sure there are valid reasons why others are opposed to your ideas.</div>
           

            <div id="5a" class="major_div"><input type="radio" id="5a1" name="select" value="video1~RCS3B004.mp4" text-color="red" feed_txt="You are failing to keep an open mind." video-ids="6a,6b,6c">Patricia, there must be some truth in what Jim is saying or else he wouldn’t be so upset.</div>
            <div id="5b" class="major_div"><input type="radio" id="5b1" name="select" value="video1~RCS3B004.mp4" text-color="red" feed_txt="You are encouraging the team members to express their viewpoints and are instead suggesting a biased attitude." video-ids="6a,6b,6c">Patricia, it doesn’t sound like you are very supportive.</div>
            <div id="5c" class="major_div"><input type="radio" id="5c1" name="select" value="video1~RCS3B004.mp4" text-color="yellow" feed_txt="You are asking other team members to express their viewpoints, but you are suggesting a biased attitude." video-ids="6a,6b,6c">Patricia, how exactly did you react? Jim must have a good reason for feeling the way he does.</div>
            <div id="5d" class="major_div"><input type="radio" id="5d1" name="select" value="video1~RCS3B004.mp4" text-color="green" feed_txt="Good. You are allowing all team members to express their viewpoints." video-ids="6a,6b,6c">Patricia, how do you see the situation?</div>
          
          
          
            <div id="6a" class="major_div"><input type="radio" id="6a1" name="select" value="video1~RCS3B005.mp4;video2~RCS3A007.mp4" text-color="yellow" feed_txt="Although you are encouraging the team members to express their viewpoints, your approach could be viewed as attacking" video-ids="7a,7b,7c">Patricia, what exactly did you say?</div>
            <div id="6b" class="major_div"><input type="radio" id="6b1" name="select" value="video1~RCS3B005.mp4;video2~RCS3A007.mp4" text-color="green" feed_txt="You are encouraging the team members to express their thoughts." video-ids="7a,7b,7c">Patricia, what are your thoughts about this project?</div>
            <div id="6c" class="major_div"><input type="radio" id="6c1" name="select" value="video1~RCS3B005.mp4;video2~RCS3A007.mp4" text-color="red" feed_txt="You are failing to encourage the team members to clarify their viewpoints and are placing blame on a team member." video-ids="7a,7b,7c">Patricia, whatever you said, it must have been pretty discouraging to create this much arguing.</div>
          

            <div id="7a" class="major_div"><input type="radio" id="7a1" name="select" value="video1~RCS3B007.mp4" text-color="green" feed_txt="You are asking other team members to express their viewpoints." video-ids="8a,8b,8c">Patricia, you’ve been reluctant to allocate monies for new projects in the past. I hope that’s not what’s happening in this case as well. </div>
            <div id="7b" class="major_div"><input type="radio" id="7b1" name="select" value="video1~RCS3B008.mp4" text-color="green" feed_txt="You are asking other team members to express their viewpoints ." video-ids="8a,8b,8c">Jim, let Patricia explain her reasons. They’re just as valid as yours.</div>
            <div id="7c" class="major_div"><input type="radio" id="7c1" name="select" value="video1~RCS3B008.mp4" text-color="yellow" feed_txt="You are encouraging the team members to express their viewpoints but are supporting a biased attitude." video-ids="8a,8b,8c">Patricia, is this true? Is that real reason why you don’t support Jim’s project?</div>
           

            <div id="8a" class="major_div"><input type="radio" id="8a1" name="select" value="video1~RCS3B008.mp4" text-color="red" feed_txt="You are failing to encourage the team members to express their viewpoints and are attacking team members." video-ids="">Patricia , I have to admit that your track record for allocating funds isn’t the greatest.</div>
            <div id="8b" class="major_div"><input type="radio" id="8b1" name="select" value="video2~RCS3A008.mp4" text-color="green" feed_txt="Good. You are treating the team members fairly and fostering a sense of unity." video-ids="9a,9b,9c">Patricia, please don’t misunderstand. We’re trying to get to root of this problem. We know you have good reasons for your position, don’t we Jim?</div>
            <div id="8c" class="major_div"><input type="radio" id="8c1" name="select" value="video2~RCS3A008.mp4" text-color="green" feed_txt="You are encouraging the team members to express their thoughts." video-ids="9a,9b,9c">Patricia, we know you have good reasons for your position on this matter, and we want to know what they are.</div>
            
            <div id="9a" class="major_div"><input type="radio" id="9a1" name="select" value="video2~RCS3A009.mp4" text-color="yellow" feed_txt="You are noting the use of an offensive joke, but you need to ask that such behavior discontinue." video-ids="12a,12b,12c">Jim, knock it off.</div>
            <div id="9b" class="major_div"><input type="radio" id="9b1" name="select" value="video1~RCS3B010.mp4" text-color="red" feed_txt="You are failing to address an offensive joke." video-ids="10a,10b,10c">Carl, what do you think about the credit card idea?</div>
            <div id="9c" class="major_div"><input type="radio" id="9c1" name="select" value="video2~RCS3A009.mp4" text-color="green" feed_txt="Good. You are appropriately addressing a team member who is making offensive jokes by asking that such behavior discontinue." video-ids="12a,12b,12c">Jim, I will not tolerate comments of that nature. I’ll ask that you keep such thoughts to yourself in the future. </div>
           

            <div id="10a" class="major_div"><input type="radio" id="10a1" name="select" value="video1~RCS3B011.mp4" text-color="red" feed_txt="You are failing to effectively address inappropriate behavior." video-ids="">Patricia , you know Jim. He’s always making comments like that. Just ignore them.</div>
            <div id="10b" class="major_div"><input type="radio" id="10b1" name="select" value="video1~RCS3B013.mp4" text-color="yellow" feed_txt="You are apologizing for the use of offensive jokes, but you need to be more assertive when addressing this kind of behavior." video-ids="11a,11b,11c">Patricia, you are right, that was rude. But you know how Jim is.</div>
            <div id="10c" class="major_div"><input type="radio" id="10c1" name="select" value="video1~RCS3B012.mp4" text-color="green" feed_txt="Good. You are appropriately addressing the  use of offensive jokes." video-ids="12a,12b,12c">Patricia, I apologize for Jim’s behavior. I assure you, comments like that will not be tolerated in this meeting.</div>
            
            
            <div id="11a" class="major_div"><input type="radio" id="11a1" name="select" value="video1~RCS3B014.mp4" text-color="yellow" feed_txt="You need to be more assertive when dealing with the use of offensive comments." video-ids="13a,13b,13c">Patricia, I’ll try to keep those comments out of this meeting from here on out.</div>
            <div id="11b" class="major_div"><input type="radio" id="11b1" name="select" value="video1~RCS3B014.mp4" text-color="red" feed_txt="You are not appropriately addressing the use of offensive jokes. Be assertive and make it known that such behavior should be discontinued." video-ids="13a,13b,13c">Patricia, I’m sure it wont happen again.</div>
            <div id="11c" class="major_div"><input type="radio" id="11c1" name="select" value="video1~RCS3B014.mp4" text-color="green" feed_txt="You are effectively addressing a team member who is making offensive jokes." video-ids="13a,13b,13c">Patricia, I assure you I wont let comments like that interrupt meeting again.</div>
            
                        
            <div id="12a" class="major_div"><input type="radio" id="12a1" name="select" value="video2~RCS3A010.mp4" text-color="red" feed_txt="You are not appropriately addressing the use of offensive jokes. You need to be more assertive when addressing this behavior." video-ids="13a,13b,13c">Jim , I know , but you really need to keep those comments to yourself.</div>
            <div id="12b" class="major_div"><input type="radio" id="12b1" name="select" value="video1~RCS3B011.mp4" text-color="red" feed_txt="You are failing to effectively address inappropriate behavior." video-ids="">Patricia, you know how Jim is. He’s always making comments like that. Just ignore them.</div>
            <div id="12c" class="major_div"><input type="radio" id="12c1" name="select" value="video2~RCS3A010.mp4" text-color="green" feed_txt="You are effectively addressing a team member who is making offensive jokes." video-ids="13a,13b,13c">Jim, not everyone shares your sense of humor. Keep those comments to yourself. </div>
            
            
            
            <div id="13a" class="major_div"><input type="radio" id="13a1" name="select" value="video3~RCS3C002.mp4" text-color="yellow" feed_txt="You are requesting feedback from all team members, but your attitude is somewhat abrasive. " video-ids="14a,14b,14c">Carl, you’ve been quiet. Aren’t you going to add your comments about the credit card issue?</div>
            <div id="13b" class="major_div"><input type="radio" id="13b1" name="select" value="video3~RCS3C002.mp4" text-color="green" feed_txt="You are encouraging the team member to express their viewpoint." video-ids="14a,14b,14c">Carl, you’ve been quiet. I’d like to hear how you  feel about the introduction of a credit card program.</div>
            <div id="13c" class="major_div"><input type="radio" id="13c1" name="select" value="video3~RCS3C002.mp4" text-color="red" feed_txt="You are asking a yes/no question as opposed to an open-ended question which offers more information." video-ids="14a,14b,14c">Carl, do you support the credit card program? </div>

     

            <div id="14a" class="major_div"><input type="radio" id="14a1" name="select" value="video3~RCS3C003.mp4" text-color="yellow" feed_txt="You are requesting feedback from the team member, but you are failing to clarify the underlying reasons for their position.  " video-ids="15a,15b,15c">Why don’t you think it’s a good idea?</div>
            <div id="14b" class="major_div"><input type="radio" id="14b1" name="select" value="video3~RCS3C003.mp4" text-color="red" feed_txt="You are not encouraging the team member to express their viewpoint and are suggesting a biased attitude." video-ids="15a,15b,15c">Do you or don’t you think it’s a good idea?</div>
            <div id="14c" class="major_div"><input type="radio" id="14c1" name="select" value="video3~RCS3C003.mp4" text-color="green" feed_txt="You are encouraging the team members to express their viewpoint and stressing the equal importance of the team members." video-ids="15a,15b,15c">I’d like to hear your thoughts. </div>
            
            
            <div id="15a" class="major_div"><input type="radio" id="15a1" name="select" value="video3~RCS3C001.mp4" text-color="red" feed_txt="You are failing to request information from the team member and are using an attacking approach." video-ids="16a,16b,16c,16d">Why not? I thought your division would be prepared to handle this type of product, given the nature of the other products you’ve developed for our customers.</div>
            <div id="15b" class="major_div"><input type="radio" id="15b1" name="select" value="video3~RCS3C001.mp4" text-color="green" feed_txt="Good. You are demonstrating effective listening skills to clarify the viewpoints of the team members." video-ids="16a,16b,16c,16d">So, you’re saying that your division wouldn’t be able to handle this kind of project with its current capabilities. </div>
            <div id="15c" class="major_div"><input type="radio" id="15c1" name="select" value="video3~RCS3C001.mp4" text-color="red" feed_txt="You are requesting feedback from the team member." video-ids="16a,16b,16c,16d">What would your division need to be able to handle such a project?</div>


            <div id="16a" class="major_div"><input type="radio" id="16a1" name="select" value="video3~RCS3C004.mp4;video1~RCS3B015.mp4" text-color="yellow" feed_txt="You are encouraging feedback from the team member, but are being somewhat aggressive in your approach. " video-ids="17a,17b,17c,17d,17e">Carl, can your division handle this kind of  project or not? I don’t want us to commit to this idea and then not be able to see it though.</div>
            <div id="16b" class="major_div"><input type="radio" id="16b1" name="select" value="video3~RCS3C005.mp4;video1~RCS3B015.mp4" text-color="red" feed_txt="You are not dealing with an accommodating approach appropriately. Encourage the team members to make their needs known." video-ids="17a,17b,17c,17d,17e">Carl, that’s the right attitude. I know your division can handle the job.</div>
            <div id="16c" class="major_div"><input type="radio" id="16c1" name="select" value="video3~RCS3C005.mp4;video1~RCS3B015.mp4" text-color="red" feed_txt="You are failing to clarify the underlying reasons for the team members position." video-ids="17a,17b,17c,17d,17e">Carl, I’m worried about it. If you’re team can’t handle the project, it makes the rest of us look incompetent.</div>
            <div id="16d" class="major_div"><input type="radio" id="16d1" name="select" value="video3~RCS3C004.mp4;video1~RCS3B015.mp4" text-color="green" feed_txt="You are effectively addressing the team members use of an accommodating approach." video-ids="17a,17b,17c,17d,17e">Carl, I don’t want you to feel pressured to support a project you don’t think your division can handle.</div>
            
            
            
            
            <div id="17a" class="major_div"><input type="radio" id="17a1" name="select" value="video1~RCS3B016.mp4;video2~RCS3A010.mp4" text-color="green" feed_txt="You are encouraging the team members to express their viewpoints." video-ids="19a,19b,19c">Patricia, what do you need to see happen for you to support this project? </div>
            <div id="17b" class="major_div"><input type="radio" id="17b1" name="select" value="video1~RCS3B016.mp4;video2~RCS3A010.mp4" text-color="yellow" feed_txt="You are requesting feedback from the team member , but you are not showing respect." video-ids="19a,19b,19c">Patricia, what’s it going to take to get your approval for this project?</div>
            <div id="17c" class="major_div"><input type="radio" id="17c1" name="select" value="video1~RCS3B016.mp4;video2~RCS3A010.mp4" text-color="green" feed_txt="Good, you are making an effort to identify the needs of the team member." video-ids="19a,19b,19c">Patricia, what can we do to make you more comfortable with the project?</div>
            <div id="17d" class="major_div"><input type="radio" id="17d1" name="select" value="video1~RCS3B017.mp4" text-color="red" feed_txt="You are being disrespectful to the team member." video-ids="18a,18b,18c">All right, what’s it going to take to get some financing for this project?</div>
            <div id="17e" class="major_div"><input type="radio" id="17e1" name="select" value="video1~RCS3B017.mp4" text-color="red" feed_txt="You are not keeping an open mind and appreciating the team members viewpoint." video-ids="18a,18b,18c">Patricia, are you going to work with us or not? </div>




            <div id="18a" class="major_div"><input type="radio" id="18a1" name="select" value="video2~RCS3A010.mp4" text-color="green" feed_txt="You are requesting feedback from the team members." video-ids="19a,19b,19c">Jim, have you provided Patricia and Carl a development plan?</div>
            <div id="18b" class="major_div"><input type="radio" id="18b1" name="select" value="video2~RCS3A010.mp4" text-color="yellow" feed_txt="You need to encourage the team members to offer feedback." video-ids="19a,19b,19c">I thought Jim was supposed to provide you with a development plan.</div>
            <div id="18c" class="major_div"><input type="radio" id="18c1" name="select" value="video1~RCS3B018.mp4" text-color="red" feed_txt="You are not appropriately addressing the team members concerns and using a attacking approach." video-ids="19a,19b,19c">Is there anything else you would need?</div>


            <div id="19a" class="major_div"><input type="radio" id="19a1" name="select" value="video2~RCS3A012.mp4" text-color="red" feed_txt="You are failing to encourage open-communication and are using an attacking approach." video-ids="20a,20b,20c,20d">Jim, that’s your problem. You need to provide us with information before we can approve a new project. </div>
            <div id="19b" class="major_div"><input type="radio" id="19b1" name="select" value="video2~RCS3A012.mp4" text-color="green" feed_txt="Good. You are encouraging the team members to clarify their reasons." video-ids="20a,20b,20c,20d">What exactly do you mean, Jim?</div>
            <div id="19c" class="major_div"><input type="radio" id="19c1" name="select" value="video2~RCS3A012.mp4" text-color="yellow" feed_txt="You are requesting feedback from the team member but could use a less attacking approach." video-ids="20a,20b,20c,20d">Jim, you’ve done development plans before. What makes this one different?</div>
            
            
            
            <div id="20a" class="major_div"><input type="radio" id="20a1" name="select" value="video2~RCS3A014.mp4;video1~RCS3B019.mp4" text-color="yellow" feed_txt="You need to be more positive about what can be gained from the conflict." video-ids="21a,21b,21c,21d">Its going to be challenging to find a solution, given each of your positions on the issue.</div>
            <div id="20b" class="major_div"><input type="radio" id="20b1" name="select" value="video2~RCS3A013.mp4;video1~RCS3B019.mp4" text-color="yellow" feed_txt="You could establish a greater sense of unity among the team members. You need to stress the positive aspects of the conflict. " video-ids="21a,21b,21c,21d">Let’s see if we can work something out for all of you. </div>
            <div id="20c" class="major_div"><input type="radio" id="20c1" name="select" value="video2~RCS3A013.mp4;video1~RCS3B019.mp4" text-color="green" feed_txt="Good. You are stressing the positive aspects of the conflict and encouraging a sense of unity." video-ids="21a,21b,21c,21d">Even though your needs are all different, I think we can find a solution that satisfies all of you.</div>
            <div id="20d" class="major_div"><input type="radio" id="20d1" name="select" value="video2~RCS3A014.mp4;video1~RCS3B019.mp4" text-color="red" feed_txt="You are failing to stress the positive aspects of the conflict. You need to establish sense of unity." video-ids="21a,21b,21c,21d">Your needs are so different, I don’t know how we’re going to meet all of them.</div>



            <div id="21a" class="major_div"><input type="radio" id="21a1" name="select" value="video2~RCS3A015.mp4" text-color="red" feed_txt="You are failing to help the team members to separate personalities from problems. Monitor the discussion appropriately. " video-ids="23a,23b,23c">Jim, I’m sorry to hear that you feel that way. I think if we work together, we can figure something out.</div>
            <div id="21b" class="major_div"><input type="radio" id="21b1" name="select" value="video3~RCS3C006.mp4" text-color="green" feed_txt="Good you are providing an environment for open communication." video-ids="22a,22b,22c">Patricia, Jim’s feelings are as valid as yours. I want to know how each of you feels about this situation.</div>
            <div id="21c" class="major_div"><input type="radio" id="21c1" name="select" value="video3~RCS3C006.mp4" text-color="yellow" feed_txt="You could make a better attempt at identifying common goals among the team members." video-ids="22a,22b,22c">Patricia lets concentrate on finding a solution, please. </div>
            <div id="21d" class="major_div"><input type="radio" id="21d1" name="select" value="video3~RCS3C006.mp4" text-color="green" feed_txt="You are effectively separating issues from personalities." video-ids="22a,22b,22c">Patricia, we’re here to find a solution that meets everyone’s needs, not to bicker over personal issues.</div>
           
           
            <div id="22a" class="major_div"><input type="radio" id="22a1" name="select" value="video2~RCS3A015.mp4" text-color="green" feed_txt="Good. You are requesting specific feedback concerning the team members viewpoint." video-ids="23a,23b,23c">Jim what do you want to accomplish by introducing the credit card program?</div>
            <div id="22b" class="major_div"><input type="radio" id="22b1" name="select" value="video2~RCS3A017.mp4" text-color="red" feed_txt="You are failing to encourage the team members to identify common goals , and are showing little concern for their feelings." video-ids="23a,23b,23c">Each of you needs to focus your attention on helping the company, instead of worrying about your differences. </div>
            <div id="22c" class="major_div"><input type="radio" id="22c1" name="select" value="video3~RCS3C007.mp4" text-color="green" feed_txt="Good. You are asking for a specific information to identify the team members goals." video-ids="25a,25b,25c,25d">Carl, what do you want to achieve by introducing this product?</div>
           
           
            <div id="23a" class="major_div"><input type="radio" id="23a1" name="select" value="video2~RCS3A018.mp4" text-color="green" feed_txt="You are staying focused on the issue at hand and accepting criticism as well." video-ids="24a,24b,24c">Jim, that is my intention. I know there’s a way we can work this out.</div>
            <div id="23b" class="major_div"><input type="radio" id="23b1" name="select" value="video2~RCS3A018.mp4" text-color="yellow" feed_txt="You could be more direct about identifying a common goal." video-ids="24a,24b,24c">Jim, that is my intention, but I think all of you are a too focused on your individual needs, and not on helping the company.</div>
            <div id="23c" class="major_div"><input type="radio" id="23c1" name="select" value="video2~RCS3A019.mp4" text-color="red" feed_txt="You are failing to stay open-minded and are not staying positive." video-ids="24a,24b,24c">Jim, that is what I’m trying to do, but until the three of you get past your differences, we’re not going to accomplish anything.</div>
            
            
            
            <div id="24a" class="major_div"><input type="radio" id="24a1" name="select" value="video3~RCS3C008.mp4" text-color="yellow" feed_txt="You need to encourage feedback from the team members to identify a common goal. " video-ids="25a,25b,25c,25d">I’m sure you can all agree that providing quality products for our customers is the overall goal, right?</div>
            <div id="24b" class="major_div"><input type="radio" id="24b1" name="select" value="video3~RCS3C007.mp4" text-color="green" feed_txt="You are encouraging the team members to identify common goals." video-ids="25a,25b,25c,25d">Carl, what do you want to see the company achieve?</div>
            <div id="24c" class="major_div"><input type="radio" id="24c1" name="select" value="video3~RCS3C007.mp4" text-color="green" feed_txt="You are attempting to identify a common goal by requesting feedback from the team members." video-ids="25a,25b,25c,25d">I’d like to know what each of you sees as the company’s overall goal.</div>



            <div id="25a" class="major_div"><input type="radio" id="25a1" name="select" value="video1~RCS3B021.mp4;video2~RCS3A020.mp4" text-color="red" feed_txt="You are failing to involve all team members when establishing a common goal." video-ids="27a,27b,27c">Good. I’m glad that’s settled. We all want to see the company provide the highest quality financial products on the market.</div>
            <div id="25b" class="major_div"><input type="radio" id="25b1" name="select" value="video1~RCS3B020.mp4;video2~RCS3A016.mp4" text-color="yellow" feed_txt="You need to encourage the open expression of viewpoints." video-ids="26a,26b,26c">Are we all in agreement?</div>
            <div id="25c" class="major_div"><input type="radio" id="25c1" name="select" value="video1~RCS3B020.mp4;video2~RCS3A016.mp4" text-color="yellow" feed_txt="You need to encourage the open expression of viewpoints." video-ids="26a,26b,26c">Patricia, I hope you feel the same way as Carl.</div>
            <div id="25d" class="major_div"><input type="radio" id="25d1" name="select" value="video1~RCS3B020.mp4;video2~RCS3A016.mp4" text-color="green" feed_txt="Good. You are encouraging all team members to participate in the goal setting process." video-ids="26a,26b,26c">Patricia, what do you think?</div>
            
            
            
            <div id="26a" class="major_div"><input type="radio" id="26a1" name="select" value="video1~RCS3B021.mp4;video2~RCS3A020.mp4" text-color="green" feed_txt="You are establishing a sense of unity among the team members and stressing the positive aspects of the conflict." video-ids="27a,27b,27c">It looks like we have discovered something we all want to accomplish. How are we going to make it happen?</div>
            <div id="26b" class="major_div"><input type="radio" id="26b1" name="select" value="video1~RCS3B021.mp4;video2~RCS3A020.mp4" text-color="yellow" feed_txt="You are belittling the importance of establishing common goals." video-ids="27a,27b,27c">Now that we finally come to an agreement, lets get to the important task of making it happen.</div>
            <div id="26c" class="major_div"><input type="radio" id="26c1" name="select" value="video1~RCS3B021.mp4;video2~RCS3A020.mp4" text-color="red" feed_txt="You are failing to stay positive and are demonstrating an impatient attitude." video-ids="27a,27b,27c">Finally, you agreed on something.</div>
            
            
            
            <div id="27a" class="major_div"><input type="radio" id="27a1" name="select" value="video3~RCS3C009.mp4;video2~RCS3A022.mp4" text-color="green" feed_txt="You are clarifying the viewpoints of the team member to encourage understanding.  " video-ids="29a,29b,29c,29d">Jim why don’t you fill us in your research.</div>
            <div id="27b" class="major_div"><input type="radio" id="27b1" name="select" value="video2~RCS3A021.mp4" text-color="red" feed_txt="You are inappropriately criticizing the team member." video-ids="28a,28b,28c">Jim, why didn’t you bring this up earlier? We could’ve saved a lot of time.</div>
            <div id="27c" class="major_div"><input type="radio" id="27c1" name="select" value="video2~RCS3A021.mp4" text-color="yellow" feed_txt="You are acknowledging the importance of the team members input, but are inappropriately offering criticism. " video-ids="28a,28b,28c">Jim, we’d really like to hear what you discovered. In fact, I wish you would’ve brought this to our attention earlier. </div>


            <div id="28a" class="major_div"><input type="radio" id="28a1" name="select" value="video3~RCS3C009.mp4;video2~RCS3A022.mp4" text-color="green" feed_txt="You are encouraging the team members to explain their viewpoint." video-ids="29a,29b,29c,29d">I guess that’s true. Why don’t you tell us the details about your research now?</div>
            <div id="28b" class="major_div"><input type="radio" id="28b1" name="select" value="video3~RCS3C009.mp4;video2~RCS3A022.mp4" text-color="red" feed_txt="You are showing little concern for team members feelings." video-ids="29a,29b,29c,29d">You need to bring these issues to our attention, Jim. This information has a direct influence on whether or not this product is developed.</div>
            <div id="28c" class="major_div"><input type="radio" id="28c1" name="select" value="video3~RCS3C009.mp4;video2~RCS3A022.mp4" text-color="yellow" feed_txt="You need to encourage the open expression of viewpoints." video-ids="29a,29b,29c,29d">Lets not worry about that now. Why don’t you tell us what you discovered. </div>
            
            
            
            <div id="29a" class="major_div"><input type="radio" id="29a1" name="select" value="video2~RCS3A023.mp4;video1~RCS3B022.mp4" text-color="red" feed_txt="You are demonstrating an impatient attitude. Take whatever time is needed to fully discuss the issues." video-ids="30a,30b,30c,30d">Jim, get to the point. We don’t have all day.</div>
            <div id="29b" class="major_div"><input type="radio" id="29b1" name="select" value="video2~RCS3A023.mp4;video1~RCS3B022.mp4" text-color="green" feed_txt="You are requesting feedback to clarify the reasons for the viewpoints of the team members." video-ids="30a,30b,30c,30d">Jim, can we avoid experiencing the same problems as our competitors?</div>
            <div id="29c" class="major_div"><input type="radio" id="29c1" name="select" value="video2~RCS3A023.mp4;video1~RCS3B022.mp4" text-color="green" feed_txt="You are effectively requesting feedback from the team member." video-ids="30a,30b,30c,30d">Jim, I think we need to understand why our competitors are having so many problems with their programs. What did you find out?</div>
            <div id="29d" class="major_div"><input type="radio" id="29d1" name="select" value="video2~RCS3A023.mp4;video1~RCS3B022.mp4" text-color="yellow" feed_txt="You are requesting feedback, but try to ask open-minded questions to encourage team members to elaborate on their thoughts." video-ids="30a,30b,30c,30d">Do you know why our competitors have had so many problems with their programs.</div>
           
           
            <div id="30a" class="major_div"><input type="radio" id="30a1" name="select" value="video2~RCS3A024.mp4" text-color="green" feed_txt="You are effectively requesting feedback from the team members." video-ids="31a,31b,31c">Are we capable of adding features that will set our product apart from the competition?</div>
            <div id="30b" class="major_div"><input type="radio" id="30b1" name="select" value="video2~RCS3A024.mp4" text-color="yellow" feed_txt="You need to try to ask open-ended questions to determine the viewpoints of the team member." video-ids="31a,31b,31c">Jim, do you still need Carl and Patricia’s help?</div>
            <div id="30c" class="major_div"><input type="radio" id="30c1" name="select" value="video2~RCS3A024.mp4" text-color="red" feed_txt="You are using a controlling approach to encourage the team members to generate solution options." video-ids="31a,31b,31c">I want to see everyone work together on creating this project. Each of you needs to contribute to the development of the features.</div>
            <div id="30d" class="major_div"><input type="radio" id="30c1" name="select" value="video2~RCS3A024.mp4" text-color="green" feed_txt="You are clarifying the relevant issues by restating them." video-ids="31a,31b,31c">Jim, you mentioned that you need both technical and financial assistance to develop the plan. What do you need from Carl and Patricia?</div>
            
            
            <div id="31a" class="major_div"><input type="radio" id="31a1" name="select" value="video2~RCS3A027.mp4" text-color="red" feed_txt="You are dictating a situation." video-ids="32a,32b,32c">The three of you need to have a meeting to discuss the features we can offer. </div>
            <div id="31b" class="major_div"><input type="radio" id="31b1" name="select" value="video2~RCS3A027.mp4" text-color="yellow" feed_txt="You are encouraging team decision making but are dictating the process." video-ids="32a,32b,32c">I think it would be beneficial if the three of you discussed possible features for the product.</div>
            <div id="31c" class="major_div"><input type="radio" id="31c1" name="select" value="video2~RCS3A026.mp4" text-color="green" feed_txt="You are requesting feedback to effectively address the team members concerns." video-ids="32a,32b,32c">Jim, how can Carl and Patricia help you identify these features?</div>
           
           
            <div id="32a" class="major_div"><input type="radio" id="32a1" name="select" value="video2~RCS3A028.mp4" text-color="red" feed_txt="You are rushing the problem-solving process. You need to show opportunities for further discussion if necessary." video-ids="33a,33b,33c">Is it really necessary to set up another meeting? Why don’t we take care of the issue now?</div>
            <div id="32b" class="major_div"><input type="radio" id="32b1" name="select" value="video1~RCS3B023.mp4" text-color="green" feed_txt="You are encouraging the team members to generate solution options." video-ids="33a,33b,33c">Patricia, what do you think about this suggestion?</div>
            <div id="32c" class="major_div"><input type="radio" id="32c1" name="select" value="video1~RCS3B023.mp4" text-color="yellow" feed_txt="You are inappropriately making decisions for the team." video-ids="34a,34b,34c">Fine. Why don’t three of you coordinate your schedules so you can meet next week. </div>
            
            
            
            <div id="33a" class="major_div"><input type="radio" id="33a1" name="select" value="video1~RCS3B023.mp4" text-color="green" feed_txt="You are requesting feedback to generate solution options. " video-ids="34a,34b,34c">Patricia, can you make it to another meeting?</div>
            <div id="33b" class="major_div"><input type="radio" id="33b1" name="select" value="video1~RCS3B023.mp4" text-color="yellow" feed_txt="You need to request feedback from the team members to generate problem solutions." video-ids="34a,34b,34c">Then I guess we have to hold another meeting.</div>
            <div id="33c" class="major_div"><input type="radio" id="33c1" name="select" value="video1~RCS3B023.mp4" text-color="red" feed_txt="You are focusing a decision upon the team members." video-ids="34a,34b,34c">All right , its settled. We’ll have another meeting next week. </div>
            
            
            <div id="34a" class="major_div"><input type="radio" id="34a1" name="select" value="video1~RCS3B025.mp4;video3~RCS3C010.mp4" text-color="red" feed_txt="You are criticizing the team member inappropriately and treating them unfairly. " video-ids="35a,35b,35c,35d,35e,35f">Patricia, are you a team player or not? If Jim has a product idea with this much potential, don’t you think we should pursue it?</div>
            <div id="34b" class="major_div"><input type="radio" id="34b1" name="select" value="video3~RCS3C010.mp4" text-color="red" feed_txt="You are failing to stay positive." video-ids="35a,35b,35c,35d,35e,35f">Carl, I hope you’re more willing to help out.</div>
            <div id="34c" class="major_div"><input type="radio" id="34c1" name="select" value="video3~RCS3C010.mp4" text-color="green" feed_txt="Good. You are eliciting responses from all team members. " video-ids="35a,35b,35c,35d,35e,35f">Carl, how do you feel about meeting with Jim to look over the research and discuss our options?</div>
           
           
           
            <div id="35a" class="major_div"><input type="radio" id="35a1" name="select" value="video3~RCS3C011.mp4" text-color="yellow" feed_txt="You are restating the overall goal, but your tone is over-assertive." video-ids="36a,36b,36c">I don’t care how you help Jim with this project, just do it. This credit card idea could really help the company.</div>
            <div id="35b" class="major_div"><input type="radio" id="35b1" name="select" value="video3~RCS3C014.mp4" text-color="red" feed_txt="You are dictating a solution to team members and failing to request feedback from team members to generate solution options." video-ids="39a,39b,39c">If neither of you can commit the time to work with Jim, why don’t we organize a task force to work on this project?</div>
            <div id="35c" class="major_div"><input type="radio" id="35c1" name="select" value="video3~RCS3C011.mp4" text-color="red" feed_txt="You are not offering criticism appropriately." video-ids="36a,36b,36c">Carl, that’s not the kind of attitude I like to see. You could be more willing to help.</div>
            <div id="35d" class="major_div"><input type="radio" id="35d1" name="select" value="video3~RCS3C011.mp4" text-color="yellow" feed_txt="You are encouraging the need to generate problem solutions, but you are not treating the team members fairly." video-ids="36a,36b,36c">You need to figure out how you’re going to give Jim the feedback he needs. You cant expect him to be a technical and financial expert.  </div>
            <div id="35e" class="major_div"><input type="radio" id="35e1" name="select" value="video3~RCS3C012.mp4" text-color="green" feed_txt="You are requesting feedback to address the team members concerns." video-ids="37a,37b,37c">Carl, can you think of anyways that you could provide Jim assistance without taking up too much of your time? </div>
            <div id="35f" class="major_div"><input type="radio" id="35f1" name="select" value="video3~RCS3C012.mp4" text-color="yellow" feed_txt="You need to encourage them open expression of viewpoints." video-ids="37a,37b,37c">If you agree with this product is worth developing, we need to decide how Jim can be advised by both of your teams.</div>
            
            
            
            
            <div id="36a" class="major_div"><input type="radio" id="36a1" name="select" value="video3~RCS3C012.mp4" text-color="green" feed_txt="You are asking open-minded questions to determine the viewpoints of team members." video-ids="37a,37b,37c">How can you make some extra time to assist Jim?</div>
            <div id="36b" class="major_div"><input type="radio" id="36b1" name="select" value="video3~RCS3C012.mp4" text-color="yellow" feed_txt="You need to specifically encourage the team members offer solution options. " video-ids="37a,37b,37c">There must be some way to make extra time for this project.</div>
            <div id="36c" class="major_div"><input type="radio" id="36c1" name="select" value="video3~RCS3C012.mp4" text-color="red" feed_txt="You need to avoid dictating a solution. " video-ids="37a,37b,37c">Carl, just free up some people on your team.</div>
            
            
            
            <div id="37a" class="major_div"><input type="radio" id="37a1" name="select" value="video3~RCS3C014.mp4" text-color="red" feed_txt="You are dictating the decision-making process." video-ids="39a,39b,39c">That’s a great idea. Why don’t we establish a task force to work on this project?</div>
            <div id="37b" class="major_div"><input type="radio" id="37b1" name="select" value="video1~RCS3B024.mp4;video3~RCS3C013.mp4" text-color="yellow" feed_txt="You are failing to request feedback from the team members to generate solution options." video-ids="38a,38b,38c">I don’t know if Patricia will agree to that.</div>
            <div id="37c" class="major_div"><input type="radio" id="37c1" name="select" value="video3~RCS3C014.mp4" text-color="red" feed_txt="You are dictating the decision-making process. " video-ids="39a,39b,39c">That’s an idea. What do you think, Patricia?</div>
            
            
            <div id="38a" class="major_div"><input type="radio" id="38a1" name="select" value="video3~RCS3C014.mp4" text-color="yellow" feed_txt="You are failing to establish a sense of unity among the team members. " video-ids="39a,39b,39c">That sounds like a good idea. Im glad someone finally came up with a reasonable plan.</div>
            <div id="38b" class="major_div"><input type="radio" id="38b1" name="select" value="video3~RCS3C014.mp4" text-color="green" feed_txt="Good. You are identifying what can be gained from the conflict and staying positive. " video-ids="39a,39b,39c">That sounds like a great idea. It will give our teams a chance to better understand each other roles in the company.</div>
            <div id="38c" class="major_div"><input type="radio" id="38c1" name="select" value="video3~RCS3C014.mp4" text-color="yellow" feed_txt="You are identifying a solution, but you could stress the additional benefits to be gained from the option." video-ids="39a,39b,39c">That’s sounds like a good idea, Cal. I think a task force might be the answer we are looking for.</div>
            
            
            
            <div id="39a" class="major_div"><input type="radio" id="39a1" name="select" value="video2~RCS3A030.mp4" text-color="red" feed_txt="You are failing to request feedback from all team members." video-ids="40a,40b,40c">That’s good to know. Since we’ve decided on a task force, I guess that wraps things up.</div>
            <div id="39b" class="major_div"><input type="radio" id="39b1" name="select" value="video2~RCS3A029.mp4;video1~RCS3B026.mp4" text-color="green" feed_txt="You are requesting feedback from all team members. " video-ids="42a,42b,42c">Jim, how do you feel about using a task force? Do you think this option will address your needs?</div>
            <div id="39c" class="major_div"><input type="radio" id="39c1" name="select" value="video2~RCS3A029.mp4;video1~RCS3B026.mp4" text-color="yellow" feed_txt="You are requesting feedback from all team members, but you are showing little concern for their emotions." video-ids="42a,42b,42c">Jim, will a task force satisfy you?</div>
           
           
           
            <div id="40a" class="major_div"><input type="radio" id="40a1" name="select" value="video2~RCS3A029.mp4;video1~RCS3B026.mp4" text-color="yellow" feed_txt="You are requesting the input of all team members but failing to identify the emotions of the team members." video-ids="42a,42b,42c">Jim, do you have an objection to the task force? </div>
            <div id="40b" class="major_div"><input type="radio" id="40b1" name="select" value="video2~RCS3A031.mp4" text-color="red" feed_txt="You are failing to consider the feelings of all team members. You are also exerting undue control over the situation." video-ids="41a,41b,41c">Jim, the task force is only your option. I think you should appreciate Carl and Patricia’s efforts to help you out.</div>
            <div id="40c" class="major_div"><input type="radio" id="40c1" name="select" value="video2~RCS3A029.mp4;video1~RCS3B026.mp4" text-color="green" feed_txt="Good. You are recognizing the importance of requesting input from all team members." video-ids="42a,42b,42c">You’re right Jim. Your opinion is definitely important. How do you feel about assembling a task force?</div>
            
            
            <div id="41a" class="major_div"><input type="radio" id="41a1" name="select" value="video2~RCS3A029.mp4;video1~RCS3B026.mp4" text-color="yellow" feed_txt="You are requesting feedback from all team members, but are showing little concern for their emotions." video-ids="42a,42b,42c">Jim, calm down. What do you want to add?</div>
            <div id="41b" class="major_div"><input type="radio" id="41b1" name="select" value="video2~RCS3A029.mp4;video1~RCS3B026.mp4" text-color="green" feed_txt="You are asking all team members to express their concerns. " video-ids="43a,43b,43c">Jim, you know that’s not true. If your opinion didn’t matter, we wouldn’t be sitting here. What are your thoughts? </div>
            <div id="41c" class="major_div"><input type="radio" id="41c1" name="select" value="video2~RCS3A032.mp4" text-color="red" feed_txt="You are showing no concern for the feelings of the team member and failing to withhold inappropriate comments. " video-ids="">Jim, we’re bending over backwards for you. Do you want to help or not?</div>
            
            
            <div id="42a" class="major_div"><input type="radio" id="42a1" name="select" value="video3~RCS3C015.mp4;video1~RCS3B026.mp4" text-color="red" feed_txt="You are failing to show concern for the feelings of the team member." video-ids="43a,43b,43c,43d">Jim, I’m sure Carl and Patricia will assign competent people to work with you.</div>
            <div id="42b" class="major_div"><input type="radio" id="42b1" name="select" value="video3~RCS3C015.mp4;video1~RCS3B026.mp4" text-color="green" feed_txt="Good. You are identifying what can be gained from the conflict and staying positive. " video-ids="43a,43b,43c,43d">Jim has a point. I know each of you believes in the abilities of your team members but consider Jim’s point of view.</div>
            <div id="42c" class="major_div"><input type="radio" id="42c1" name="select" value="video3~RCS3C015.mp4;video1~RCS3B026.mp4" text-color="yellow" feed_txt="You are encouraging team decision making but are dictating the process. " video-ids="43a,43b,43c,43d">I think Jim has a point. You need to make sure the team members you assign are capable individuals. </div>
            
            
                       
            <div id="43a" class="major_div"><input type="radio" id="43a1" name="select" value="video2~RCS3A033.mp4" text-color="green" feed_txt="You are requesting feedback from the team member to determine what solution should be implemented." video-ids="44a,44b,44c">Jim, now that you know how Carl and Patricia feel, what are your thoughts about the task force?</div>
            <div id="43b" class="major_div"><input type="radio" id="43b1" name="select" value="video2~RCS3A033.mp4" text-color="yellow" feed_txt="You need to show more concern for the feelings of the team member." video-ids="44a,44b,44c">Jim, do you feel comfortable with this arrangement? </div>
            <div id="43c" class="major_div"><input type="radio" id="43c1" name="select" value="video2~RCS3B029.mp4" text-color="red" feed_txt="You are failing to request feedback from all team members to determine a solution. " video-ids="47a,47b,47c">Great! I’m glad that’s settled. We’ll start assembling a task force to address this matter.</div>
            <div id="43d" class="major_div"><input type="radio" id="43d1" name="select" value="video2~RCS3A033.mp4" text-color="red" feed_txt="You are requesting feedback from all team members, but trying to rush the problem solving process." video-ids="44a,44b,44c">Are you satisfied, Jim? We really need to wrap this up.</div>
            
            
            
            <div id="44a" class="major_div"><input type="radio" id="44a1" name="select" value="video1~RCS3B028.mp4;video2~RCS3A034.mp4" text-color="green" feed_txt="You are making an attempt to make sure that all team members support the decision." video-ids="45a,45b,45c">Is everyone satisfied with the idea of using a task force on this product?</div>
            <div id="44b" class="major_div"><input type="radio" id="44b1" name="select" value="video1~RCS3B028.mp4;video2~RCS3A034.mp4" text-color="yellow" feed_txt="You are requesting feedback from the team member, but you are demonstrating an impatient attitude." video-ids="45a,45b,45c">Good, are there any complaints about the task force before we wrap up?</div>
            <div id="44c" class="major_div"><input type="radio" id="44c1" name="select" value="video1~RCS3B028.mp4;video2~RCS3A034.mp4" text-color="green" feed_txt="Good. You are taking measures to determine if all team members are satisfied with the decision." video-ids="45a,45b,45c">How does everyone feel about the task force?</div>
            
            
            
            <div id="45a" class="major_div"><input type="radio" id="45a1" name="select" value="video1~RCS3B029.mp4" text-color="red" feed_txt="You are failing to request feedback from all team members when deciding what solution should be implemented." video-ids="47a,47b,47c">Great! I’m glad everything is settled. </div>
            <div id="45b" class="major_div"><input type="radio" id="45b1" name="select" value="video3~RCS3C016.mp4" text-color="yellow" feed_txt="You are asking for feedback from the team member, but you are using an attacking approach." video-ids="46a,46b,46c">Carl, speak up if you have anything to add.</div>
            <div id="45c" class="major_div"><input type="radio" id="45c1" name="select" value="video3~RCS3C016.mp4" text-color="green" feed_txt="You are making sure that all team members support chosen decision." video-ids="46a,46b,46c">Carl, do you have anything to add?</div>
           
           
           
            <div id="46a" class="major_div"><input type="radio" id="46a1" name="select" value="video1~RCS3B029.mp4" text-color="red" feed_txt="You are not respecting the parties and failing to stress the positive conflict aspects. " video-ids="47a,47b,47c">Finally I wasn’t sure if you were ever going to agree. Lets finish organizing the task force.</div>
            <div id="46b" class="major_div"><input type="radio" id="46b1" name="select" value="video1~RCS3B029.mp4" text-color="yellow" feed_txt="You are focusing on incorporating the best solution option into comprehensive plan, but you could be more positive about the conflict." video-ids="47a,47b,47c">	Well I guess we can finally start planning the task force.</div>
            <div id="46c" class="major_div"><input type="radio" id="46c1" name="select" value="video1~RCS3B029.mp4" text-color="green" feed_txt="You are focusing on incorporating the best solution option into the resolution plan. " video-ids="47a,47b,47c">Great. Lets start planning for the task force.</div>
            
            
            <div id="47a" class="major_div"><input type="radio" id="47a1" name="select" value="video3~RCS3C017.mp4" text-color="green" feed_txt="You are identifying the responsibilities of each team member for implementing a solution plan." video-ids="49a,49b,49c">Patricia, you and Carl need to determine which members of your teams will be involved in the task force.</div>
            <div id="47b" class="major_div"><input type="radio" id="47b1" name="select" value="video1~RCS3B030.mp4" text-color="red" feed_txt="You are failing to identify the responsibilities of each team member for implementing a solution plan." video-ids="48a,48b,48c">Its pretty straight forward. Do we need to go over it again?</div>
            <div id="47c" class="major_div"><input type="radio" id="47c1" name="select" value="video1~RCS3B030.mp4" text-color="red" feed_txt="You are requesting feedback from all team members, but are showing little concern for their feelings." video-ids="48a,48b,48c">Why don’t we get together in a week and go over the details then.</div>
            
            
            
            <div id="48a" class="major_div"><input type="radio" id="48a1" name="select" value="video1~RCS3B031.mp4;video3~RCS3C018.mp4" text-color="yellow" feed_txt="You are failing to request feedback of the team members when identifying a specific course of action to be taken." video-ids="49a,49b,49c">Get your task force team members to a meeting with Jim at this same time and place next week.</div>
            <div id="48b" class="major_div"><input type="radio" id="48b1" name="select" value="video1~RCS3B044.mp4" text-color="" feed_txt="" video-ids="">Patricia , Im sure you can work that out among yourselves. I have another meeting to attend. Ill check back with each of you later.</div>
            <div id="48c" class="major_div"><input type="radio" id="48c1" name="select" value="video1~RCS3B031.mp4;video3~RCS3C018.mp4" text-color="green" feed_txt="You are encouraging team decision making and requesting feedback." video-ids="49a,49b,49c">We need to set a time and place for your task force team members to meet with Jim. Will this same time and place work next week?</div>
            
            
            <div id="49a" class="major_div"><input type="radio" id="49a1" name="select" value="video1~RCS3B031.mp4;video3~RCS3C018.mp4" text-color="green" feed_txt="You are failing to request feedback and are dictating a solution." video-ids="50a,50b,50c">Jim, can you make sure you can meet at the same time and place next week.</div>
            <div id="49b" class="major_div"><input type="radio" id="49b1" name="select" value="video1~RCS3B031.mp4;video3~RCS3C018.mp4" text-color="yellow" feed_txt="You are failing to request the feedback of the team members when identifying a specific course of action to be taken." video-ids="50a,50b,50c">Get your task force team members to a meeting with Jim at this same time and place next week.</div>
            <div id="49c" class="major_div"><input type="radio" id="49c1" name="select" value="video1~RCS3B031.mp4;video3~RCS3C018.mp4" text-color="green" feed_txt="You are encouraging team decision making and requesting feedback." video-ids="50a,50b,50c">We need to set a time and place for your task force team members to meet with Jim. Will this same time and place work next week?</div>
           
           
           
            <div id="50a" class="major_div"><input type="radio" id="50a1" name="select" value="video2~RCS3A035.mp4" text-color="red" feed_txt="You are showing little concern for the team members situations and are being aggressive." video-ids="51a,51b,51c">I don’t care how you do it, just figure out how to get them in touch with Jim.</div>
            <div id="50b" class="major_div"><input type="radio" id="50b1" name="select" value="video2~RCS3A035.mp4" text-color="green" feed_txt="You are identifying a specific course of action to be pursued." video-ids="51a,51b,51c">That’s understandable. Just make sure you let Jim know when your team members are available so he can coordinate his schedule.</div>
            <div id="50c" class="major_div"><input type="radio" id="50c1" name="select" value="video2~RCS3A035.mp4" text-color="yellow" feed_txt="You are identifying a specific course of action to be taken, but you are being aggressive in your manner." video-ids="51a,51b,51c">Find out when they can meet. Jim needs to know so he can coordinate his schedule.</div>
       

            <div id="51a" class="major_div"><input type="radio" id="51a1" name="select" value="video1~RCS3B032.mp4" text-color="yellow" feed_txt="You are identifying a specific course of action to take but are inappropriately criticizing the team member." video-ids="52a,52b,52c">Since you forgot to bring your research with you today, make sure its ready to present at the first task force meeting.</div>
            <div id="51b" class="major_div"><input type="radio" id="51b1" name="select" value="video1~RCS3B032.mp4" text-color="green" feed_txt="You are clearly identifying the responsibilities of the team member." video-ids="52a,52b,52c">Why don’t you put together a presentation of your research for the first task force meeting?</div>
            <div id="51c" class="major_div"><input type="radio" id="51c1" name="select" value="video1~RCS3B032.mp4" text-color="yellow" feed_txt="You are failing to identify the responsibilities of each team member for implementing the solution plan." video-ids="52a,52b,52c">I don’t think there’s much for you to do. You’ll have to wait until Carl and Patricia can give you some people to work with.</div>
      

            <div id="52a" class="major_div"><input type="radio" id="50a1" name="select" value="" text-color="" feed_txt="" video-ids="">I guess so. Good luck with the task force and the credit card program. I think it could be a real asset to this company.</div>
            <div id="52b" class="major_div"><input type="radio" id="50b1" name="select" value="video2~RCS3A036.mp4" text-color="" feed_txt="" video-ids="">I guess so unless anyone has something else to add.</div>
            <div id="52c" class="major_div"><input type="radio" id="50c1" name="select" value="video2~RCS3A037.mp4" text-color="" feed_txt="" video-ids="">I’d like to meet again to see how this situation is progressing. I’ll be in touch after the task force has had a chance to get settled.</div>
      
             
       
        </div>
        <footer>
            <p>Copyright &copy; </p>
        </footer>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/modernizr.2.5.3.min.js"></script>
    <script type="text/javascript" src="js/templatemo_script.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            for (var i = 0; i < 3; i++) {
                $("#buttonSpeakContainer").before($("<div />").append($('#divRadioSrc .major_div:eq(' + i + ')').clone()).html());
            }

            //var vidSrc = "/C:/Users/rtipi/Desktop/Pics/";
            var vidSrc = "videos/\main/\sim3movs\/";
            $('#speak').click(function () {
                //$('#sim_item2').hide();
                var checked_val = $('input[name=select]:checked');
                var checked_value = checked_val.val();
                if (typeof (checked_value) !== 'undefined' && checked_value !== '') {
                    var color_text = checked_val.attr('text-color');
                    var text_feed = checked_val.attr('feed_txt');


                    var radioButton = $('input[name=select]:checked', '#Div3').attr('id');
                    var ids = $('input[name=select]:checked', '#Div3').attr('video-ids') //$('input[name=Video]:checked');
                    ids = ids.split(',');
                    //$('.major_div').hide();
                    $('#Div3').find('.major_div').remove();
                    for (var i = 0; i < ids.length; i++) {
                        $("#buttonSpeakContainer").before($("<div />").append($('#divRadioSrc #' + ids[i]).clone()).html());
                        //$('#' + ids[i]).show();
                    }

                    //To play video with continuous series
                    //works for one video, two or more videos to differnt or same video player or mixed
                    playVideo($('#' + radioButton).val());

                    $('.color_feed').css('opacity', '0.3');
                    $('.' + color_text + '_feed').css('opacity', '1.0');
                    setTimeout(function () {
                        $('#feedback_text').html(text_feed);
                    }, 500);
                    $('#feedback_text').html(text_feed);
                    $('#feedback_text').removeAttr('class');
                    $('#feedback_text').addClass(color_text);
                     const user_id = <?php echo json_encode($userid); ?>;
    console.log("User ID:", user_id);
                   console.log("Color:", color_text);
console.log("Checked Value:", checked_value);
console.log("Feedback Text:", text_feed);

 
                   $.ajax({
    url: 'insert_conflict.php',
    method: 'POST',
    data: {
        conflict_type: 'conflict 3', // page name without .php
        colorfeed: color_text,
        value: checked_value,
        text_feed: text_feed,
        user_id: user_id
    
    },
    success: function(response) {
        console.log('Inserted:', response);
    },
    error: function(xhr, status, error) {
        console.error('Insert error:', error);
    }
});
                }
                else {
                    alert("Please select atleast one.");
                }
            });

            function playVideo(videoSrc) {
                $('#video1').trigger('pause');
                $('#video2').trigger('pause');
                $('#video3').trigger('pause');
                $("#video1").unbind("ended");
                $("#video2").unbind("ended");
                $("#video3").unbind("ended");
                var playVideoId = '';
                var endCharIndex = 0;
                if (videoSrc.indexOf(';') > 0) {
                    endCharIndex = videoSrc.indexOf(';');
                }
                else {
                    endCharIndex = videoSrc.length;
                }

                var currentSrc = videoSrc.substr(0, endCharIndex);
                var nextSrc = videoSrc.substr(endCharIndex + 1, videoSrc.length);
                playVideoId = currentSrc.split('~')[0];
                //window.alert(vidSrc + currentSrc.split('~')[1]);
                $('#' + playVideoId).attr('src', vidSrc + currentSrc.split('~')[1]);
                $("#" + playVideoId).trigger('play');
                if ($.trim(nextSrc) != '') {
                    $("#" + playVideoId).bind("ended", function () {
                        playVideo($.trim(nextSrc));
                    });
                }
            }
        });
    </script>
</body>
</html>



<?php
session_destroy();

?>






