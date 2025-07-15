<?php
  session_start(); 
  if(!$_SESSION['logged']){ 
      header("Location: login/login.php"); 
      exit; 
  }
?>

<!doctype html>
<html>
    <head>
        <title>Conflict Management</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta charset="UTF-8">


        <link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	
    </head>
    <body>
        <div class="main-container">
            <nav class="main-nav" style="padding-bottom: 0px;">
                <div id="logo" class=""><a href="#">Conflict Management</a></div>
                <br>
                <h1 style="margin-bottom: 0;float: left;margin-left: 25px;">Conflict with the Manager</h1>
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
                    <div>
                        <div id="sim_item" style="margin-left: 115px;">
                            <video  id="sim_video" src="videos\main\sim1movs\RCS1A093.mp4" width="300" height="300" autoplay>
                            </video>
                        </div>
                        <div style="background-color: orange;float: right;width: 300px;margin-right: 275px;margin-top: 20px;">
                            <div style="padding: 10px;" id="main_1" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A001.mp4" text-color="yellow" feed_txt="You need to make a greater effort to establish a sense of unity and foster communication.">Beth, I really need to talk to you about something.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A001.mp4" text-color="green" feed_txt="Good. You are demonstrating empathy and fostering communication."> Thanks for dropping by, Beth. I know you’ve got your hands full, but there is something I think we need to discuss.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A001.mp4" text-color="red" feed_txt="You are failing to establish a sense of unity and foster communication."> Beth, we have some important issues to discuss.</div>
                            </div>
                            <div style="padding: 10px;display: none;" id="main_2" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A002.mp4" text-color="yellow" feed_txt="You are soliciting the opinion of the other party, but need to be more specific when addressing the problem.">Do you know why we’ve had increase in customer complaints lately? </div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A002.mp4" text-color="red" feed_txt="You are suggesting blame instead of addressing the problem.">  What can you tell me about the problems your division has been having lately?</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A002.mp4" text-color="yellow" feed_txt="You are addressing the problem directly, but failing to ask for the other party’s opinion.">Beth, I want to know if you’re taking care of the problems with the portfolio management software.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A002.mp4" text-color="yellow" feed_txt="You need to be more specific when addressing the problem."> Beth, I wanted to talk to you about the increase in complaints we’ve been experiencing.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A002.mp4" text-color="green" feed_txt="You are clearly identifying the problem that needs to be addressed.">Beth, I am really concerned about the increase in complaints regarding our new portfolio management software</div>
                            </div>
                            <div style="padding: 10px;display: none;" id="main_3" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A004.mp4" text-color="yellow" feed_txt="You are requesting feedback from the other party, but are suggesting blame?">I heard customer support was handling a lot of complaints. What are you going to do to take care of the situation?</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A004.mp4" text-color="green" feed_txt="Although you are clarifying the problem, you are failing to obtain the other party’s view point."> I was told this morning that the customer support is still handling a significant amount of complaints regarding the stock portfolio software.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A004.mp4" text-color="red" feed_txt="You are failing to address an avoiding approach.">I heard customer support was handling a large amount of complaints. May be they are just blowing the problem out of proportion.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A004.mp4" text-color="green" feed_txt="You are clarifying the problem for the other party and asking for their feedback.">I’ve been told that customer support is still handling an alarming amount of complaints from angry customers who can’t access their stock portfolios. Are you aware of these complaints</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A004.mp4" text-color="red" feed_txt="You are attacking the other party without attempting to fully understand the situation.">Customer support is swarmed with complaints from angry customers who can’t access their stock portfolios. Is your department incapable of fixing the problem?</div>
                            </div>
                            <div style="padding: 10px;display: none;" id="main_4" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A006.mp4" text-color="yellow" feed_txt="You are specifically describing the potential damage to the organization.">I disagree, I think this problem is really hurting the company</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A006.mp4" text-color="red" feed_txt="You are allowing your emotions to interfere with effective communication.">Are you kidding? This problem is ruining the company’s reputation and future sales of this product.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A006.mp4" text-color="green" feed_txt="You are explaining how the conflict is damaging and recognizing the need to consult other managers to identify the problem.">I disagree. I spoke with the call center manager. He feels that the number of complaints can seriously affect our reputation and future sales of this product.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A006.mp4" text-color="red" feed_txt="You are not keeping your emotions under control and are suggesting blame.">This situation could cause us to lose a lot of valuable business. Are you willing to be responsible for that?</div>                                
                            </div>
                            <div style="padding: 10px;display: none;" id="main_5" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A007.mp4" text-color="red" feed_txt="You are not considering the other party’s point of view.">I don’t want to hear how you managed problems in the past. I care about how you’re going to handle this problem.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A006.mp4" text-color="green" feed_txt="You recognize the need to address the conflict promptly."> Beth, this is a serious problem. We need to take care of this matter before the damage is irreversible.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A006.mp4" text-color="yellow" feed_txt="You are listening to the other party’s view, but you need to clarify your thoughts.">I know you have, but this situation is different.</div>
                                
                            </div>
                            <div style="padding: 10px;display: none;" id="main_6" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A008.mp4" text-color="green" feed_txt="You are not considering the other party’s point of view.">Beth, your division produces outstanding products. However it’s clear that there are some problems with this software. We need to get the bugs worked out as soon as possible.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A082.mp4" text-color="red" feed_txt="You are not offering criticism in appropriate manner and are suggesting blame."> Beth, your division created this problem and I want you to take care of it immediately.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A008.mp4" text-color="yellow" feed_txt="You are offering criticism appropriately, but are failing to remain positive.">Beth, it seems that your division is having some problem with this software. I thought that the program was ready for market, but now I’m learning otherwise.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A009.mp4" text-color="red" feed_txt="You could be more specific about outlining a course of action.">Beth, what is your division prepared to do to take care of this problem?</div>
                                
                            </div>
                            <div style="padding: 10px;display: none;" id="main_7" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A011.mp4" text-color="red" feed_txt="You are reacting defensively to the other party and failing to control your emotions.">Are you willing to help solve this problem or not?</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A011.mp4" text-color="red" feed_txt="You are being disrespectful to the other party and suggesting blame.">That’s obvious. I don’t remember our company ever having a software problem of this magnitude.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A011.mp4" text-color="green" feed_txt="You are making an effort to address the conflict promptly. You are also refraining from placing blame on the other party.">I’m not concerned about who’s is responsible for this situation as long as we take care of it as soon as possible.</div>
                                                                
                            </div>
                            <div style="padding: 10px;display: none;" id="main_8" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A012.mp4" text-color="yellow" feed_txt="You are reacting defensively to the other party and failing to control your emotions.">Good, I’m sure we can find a way to get the software running properly.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A012.mp4" text-color="red" feed_txt="You are being disrespectful to the other party and suggesting blame.">I certainly hope so. If we don’t take care of the software problem, this company’s future could be in real danger.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A012.mp4" text-color="green" feed_txt="Good, you are identifying the positive aspects of conflict.">Good, I think if we work together, we can get to the source of the problem and maybe identify some areas in need of change.</div>
                                                                
                            </div>
                            <div style="padding: 10px;display: none;" id="main_9" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A011.mp4" text-color="red" feed_txt="You area requesting information from the other party, but you are suggesting blame.">Why has your department had so many problems with the software?</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A011.mp4" text-color="yellow" feed_txt="Good. You area requesting feedback from the other party.">Tell me what you think the main problems with the software are?</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A011.mp4" text-color="green" feed_txt="Good. You area requesting feedback from the other party.">What exactly do you see as the main problems with the software?</div>
                                                                
                            </div>                           
                            <div style="padding: 10px;display: none;" id="main_10" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A013.mp4" text-color="red" feed_txt="You are directly blaming the other party when asking for feedback.">Is your department incapable of incorporating all the features into the software?</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A013.mp4" text-color="yellow" feed_txt="You are clarifying your thoughts, but you should ask questions to determine the other party viewpoint.">We are not offering that many more features than other software packages we’ve developed in the past.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A014.mp4" text-color="red" feed_txt="You are failing to request feedback from the other party and area suggesting blame.">That shouldn’t have been a problem. You knew ahead of time what features this software was going to offer.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A013.mp4" text-color="yellow" feed_txt="You are failing to request feedback from the other party and are being defensive and suggesting blame.">We gave your team a list of the features to be offered.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A013.mp4" text-color="green" feed_txt="You are effectively requesting information from the other party.">Do you feel we are offering too many features?</div>
                                                                
                            </div>
                             <div style="padding: 10px;display: none;" id="main_11" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A015.mp4" text-color="yellow" feed_txt="You are becoming defensive instead of asking the other party to clarify their view point.">That’s impossible. I know for a fact that my development team provided you with a feature report. You had all the software details you needed.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A015.mp4" text-color="green" feed_txt="Good. You are using active listening skills by paraphrasing what the other party has said to ensure that you understand their point.">Let me get this straight. Your team wasn’t given a feature report with all the software details?</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A015.mp4" text-color="green" feed_txt="Although you are requesting information from the other party, your approach could be viewed as defensive.">That can’t be right. My development team should have provided you with a feature report that included all the software details.</div>
                                                                
                            </div>
                            <div style="padding: 10px;display: none;" id="main_12" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A016.mp4" text-color="yellow" feed_txt="You could clarify your thoughts more specifically.">I thought you have all the information you needed.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A016.mp4" text-color="red" feed_txt="You are failing to maintain an open mind and are reaching to the other party’s statement instead of maintaining your composure.">That wasn’t my understanding. You must be mistaken.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A016.mp4" text-color="yellow" feed_txt="You are clarifying your thoughts, but you should ask questions to determine the other party’s viewpoint.">It was my understanding that my development team submitted a complete features report to your division.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A016.mp4" text-color="green" feed_txt="You are responding with respect to the other party and not reacting emotionally.">You mean my team didn’t submit a full feature report to you?</div>
                                                                
                            </div>
                            <div style="padding: 10px;display: none;" id="main_13" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A018.mp4" text-color="red" feed_txt="You are failing to maintain an open mind and are not soliciting more information about the situation.">There weren’t any late feature additions.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A018.mp4" text-color="red" feed_txt="You are failing to solicit more information about the situation.">I wasn’t aware of any late feature additions.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A018.mp4" text-color="green" feed_txt="You are asking the other party to clarify their viewpoint.">And these late feature additions created problems for your team?</div>
                                                                
                            </div>
                             <div style="padding: 10px;display: none;" id="main_14" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A019.mp4" text-color="green" feed_txt="Good, You are soliciting information about the other party’s viewpoint.">Were you given an explanation why late additions occurred?</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A019.mp4" text-color="red" feed_txt="You are failing to maintain an open mind. You are reacting to the other party’s statement, instead of maintaining your composure.">I’m sure my team had good reasons for any late additions.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A019.mp4" text-color="red" feed_txt="You are failing to show concern for the feelings of the other party.">If there were late additions I’m sure they were critical to the success of the software. Besides, that’s just part of the job.</div>
                                <div><input type="radio" name="select" value="4" video-attr="videos\main\sim1movs\RCS1A019.mp4" text-color="yellow" feed_txt="Did you ask my team why they had late additions? I’m sure they had valid reasons.">Did you ask my team why they had late additions? I’m sure they had valid reasons.</div>                                                      
                            </div>
                            <div style="padding: 10px;display: none;" id="main_15" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A022.mp4" text-color="red" feed_txt="Your approach could be perceived as defensive.">My team knows what they’re doing. I’m sure they had their reasons for the late feature additions.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A021.mp4" text-color="yellow" feed_txt="You are clarifying your reasons, but you need to ask for further information the other party’s viewpoint.">Even if an explanation wasn’t offered, I know there must be a valid reason why the late feature additions were made.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A021.mp4" text-color="green" feed_txt="Good, you are encouraging the other party to express their thoughts.">Since they didn’t offer any clear explanation, what do you think caused the late feature additions?</div>                                     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_16" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A025.mp4" text-color="yellow" feed_txt="You are offering reasons for your viewpoint, but are not accepting criticism appropriately and instead becoming defensive.">That deadline was appropriate. We need deadlines to ensure that projects get completed on time. Otherwise, nothing would ever done around here.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A025.mp4" text-color="green" feed_txt="You are accepting criticism from the other party appropriately and requesting feedback.">Why do you feel that way?</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A025.mp4" text-color="yellow" feed_txt="You are soliciting feedback from the other party, but your approach could be viewed as defensive.">What does the deadline I set has to do with anything?</div>
                                <div><input type="radio" name="select" value="4" video-attr="videos\main\sim1movs\RCS1A025.mp4" text-color="red" feed_txt="You are specifically identifying the problem. Your approach could also be viewed as defensive.">This problem has nothing to do with the deadline I set for my workers.</div>
                                                                
                            </div>
                            <div style="padding: 10px;display: none;" id="main_17" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A028.mp4" text-color="yellow" feed_txt="Although You are explaining your viewpoint, you are failing to ask the other party to clarify their reasons.">If I hadn’t set the deadline when I did, we wouldn’t have been able to get the software out on the market before our competitors.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A028.mp4" text-color="red" feed_txt="You are being defensive in your approach and failing to ask the other party to clarify their thoughts.">That deadline was what got our product on the market in time.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A027.mp4" text-color="green" feed_txt="You are asking the other party to clarify their thoughts.">Why exactly do you feel the deadline was unreasonable?</div>                                                
                            </div>
                            <div style="padding: 10px;display: none;" id="main_18" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A030.mp4" text-color="red" feed_txt="You are failing to identify the source of the problem. (R)">Look, if some of my workers had a problem getting you the software details by the deadline, I’ll speak with them and make sure it doesn’t happen again.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A029.mp4" text-color="green" feed_txt="You are requesting feedback from the other party. ">Do you think adding features affects your team’s performance that much?</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A029.mp4" text-color="green" feed_txt="You are asking the other party to clarify their viewpoint.">Tell me how these late feature additions affected your team’s development of the software.</div>
                                <div><input type="radio" name="select" value="4" video-attr="videos\main\sim1movs\RCS1A030.mp4" text-color="yellow" feed_txt="You are focusing on the positive aspect of the conflict, but failing to identify the source of the conflict.">I want to prevent this from happening again. Is my team giving you substandard work?</div>
                                                                
                            </div>
                            <div style="padding: 10px;display: none;" id="main_19" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A033.mp4" text-color="red" feed_txt="You are suggesting that the other party is to blame.">Your team should be accustomed to implementing new features.  It’s not like they haven’t had to before.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A033.mp4" text-color="yellow" feed_txt="You are attempting to show empathy to the other party, but are also suggesting blame.">I’m sure it is, but I thought your division could handle the pressure.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A031.mp4" text-color="green" feed_txt="Good you are demonstrating active listening skills and asking for more feedback about the situation.">When you say ‘quite a task’, what exactly do you mean by that? </div>
                                <div><input type="radio" name="select" value="4" video-attr="videos\main\sim1movs\RCS1A033.mp4" text-color="yellow" feed_txt="You are requesting feedback from the other party, but are suggesting blame when doing so. ">Is the work too much for your teams to handle?</div>
                                                                
                            </div>
                            <div style="padding: 10px;display: none;" id="main_20" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A032.mp4" text-color="green" feed_txt="Good. You are clearly communicating your thoughts.">I can appreciate the extra work these late additions created for your team, but how does that situation relate to the overall quality of the software?</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A032.mp4" text-color="yellow" feed_txt="You are asking the other party to explain their thoughts, but your approach could be viewed as attacking.">What does that have to do with the software quality?</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A032.mp4" text-color="red" feed_txt="You are failing to ask the other party to clarify their reasons.">That still doesn’t explain why the software has so many bugs.</div>
                                <div><input type="radio" name="select" value="4" video-attr="videos\main\sim1movs\RCS1A032.mp4" text-color="red" feed_txt="You are showing little concern for the other party’s situation and placing blame.">It’s your division responsibility to handle these additions when they’re necessary. I don’t see how this affects the software quality.</div>
                                                                
                            </div>
                            <div style="padding: 10px;display: none;" id="main_21" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A019.mp4" text-color="yellow" feed_txt="You are probing for feedback, but being defensive in your approach.">You do realize that the late requests are going to happen now and then, don’t you?</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A019.mp4" text-color="green" feed_txt="You are being descriptive when communicating your thoughts.">I understand why a complete report is helpful, but you do realize there will always be a chance that we’ll need to add new features.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A019.mp4" text-color="red" feed_txt="You are not treating the other party with respect and are failing to be descriptive when explaining your thoughts.">We can’t always submit complete reports. That’s something your division is just going to have to accept.</div>
                            </div>
                            <div style="padding: 10px;display: none;" id="main_22" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A036.mp4" text-color="green" feed_txt="Good, you are encouraging the other party to identify their needs.">What can be done to help you to be better prepared to handle late requests?</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A036.mp4" text-color="red" feed_txt="You are failing to address the concerns of the other party.">So then what’s the problem?</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A036.mp4" text-color="red" feed_txt="You are failing to address the concerns of the other party.">Then I don’t see why you had a problem with the late features of this project</div>
                                
                            </div>
                            <div style="padding: 10px;display: none;" id="main_23" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A036.mp4" text-color="red" feed_txt="You are failing to recognize the positive changes that conflict can create.">That’s an idea, but I’m not sure if we can give a list that would be beneficial. The software features can fluctuate quite a bit. </div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A036.mp4" text-color="yellow" feed_txt="You could be more optimistic about the positive changes conflict can create.">I’ll keep that in mind.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A036.mp4" text-color="green" feed_txt="You are recognizing the positive changes that conflict can create. ">That sounds reasonable. Compiling an early feature list would probably be useful for us as well. </div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_24" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A085.mp4" text-color="yellow" feed_txt="You could make a better effort to clarify the issues that have been discussed to this point.">I’ll see what I can do getting you early feature outlines.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A085.mp4" text-color="red" feed_txt="You are rushing the meeting. Allow plenty of time to cover all relevant issues that need to be discussed.">Fine. I’ll see what I can do about providing your teams with early feature outlines. Will that take care of this matter?</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A040.mp4" text-color="green" feed_txt="You are clarifying a relevant issue by restating it.">So the issue here is that you can handle late requests as long as you have already anticipated that they’re likely to happen.</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_25" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A036.mp4" text-color="yellow" feed_txt="Although you are asking the other party to express their concerns, you could emphasize the importance of expressing these concerns.">What else do you want to talk about?</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A036.mp4" text-color="red" feed_txt="You could be more optimistic about the positive changes conflict can create.">You are using an attacking approach and failing to identify the other party’s needs.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A036.mp4" text-color="green" feed_txt="Good. You are encouraging open communication by emphasizing the need to discuss the concerns of the other party.">Let’s talk about it. I don’t want to leave any concerns unaddressed.</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_26" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A044.mp4" text-color="yellow" feed_txt="You are failing to address the other party’s concerns.">I’m not aware of any problems.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A044.mp4" text-color="green" feed_txt="Good. You are encouraging the other party to express their concerns.">What do you mean/ there is a problem?</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A044.mp4" text-color="green" feed_txt="You are not acknowledging a potential conflict.">What are you talking about? Our departments get along fine as far as I can tell.</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_27" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A047.mp4" text-color="red" feed_txt="You are failing to identify an area in need of change, and are showing little concern for the other party’s well being.">We ask for your division’s opinion all the time, Beth. I don’t know what you’re getting upset about.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A046.mp4" text-color="green" feed_txt="Good. You are demonstrating concern for the other party and asking them to clarify their thoughts.">I had no idea you felt this way, What specifically makes you feel that there’s a problem?</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A047.mp4" text-color="yellow" feed_txt="You are asking the other party to clarify their thoughts but your approach could be viewed as defensive. ">What do you mean? We’ve asked for your input before.</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_28" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A049.mp4" text-color="yellow" feed_txt="You are failing to thoroughly clarify the reasons behind your viewpoint.">I guess I had never considered including your division before.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A049.mp4" text-color="green" feed_txt="Good you are clarifying the reasons behind your viewpoint.">I guess I’ve never considered having a member of your division sit on the development process. We tend to get pretty wrapped up in our responsibilities.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A086.mp4" text-color="red" feed_txt="You are belittling the importance of the other party’s role in the organization.">Beth, my division bears a huge responsibility for this company. All your division needs to be concerned about is taking the plans we give you and incorporating them into software.</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_29" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A050.mp4" text-color="green" feed_txt="Good. You are emphasizing the equal importance of both you and the other party in the organization.">You’re right. Both of our divisions have significant responsibilities to this company; it makes sense that we should consult one another more.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A051.mp4" text-color="red" feed_txt="You are failing to emphasize the equal importance of each party’s position in the organization.">Yes, you have to understand that my division sometimes has to make decisions on our own. That’s the position we hold in this company.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A050.mp4" text-color="yellow" feed_txt="You are failing to emphasize the equal importance of both you and the other party in the organization.">That’s a good point. May be you should sit in on more of our development meetings.</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_30" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A047.mp4" text-color="yellow" feed_txt="You need to make a better effort to emphasize similarities between you and the other party.">Look your company needs to develop the best financial management software on the market.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A046.mp4" text-color="red" feed_txt="You are failing to try to solve the problem as a team.">My goal is to make sure that this company develops the best financial management software on the market.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A047.mp4" text-color="green" feed_txt="Good. You are emphasizing similarities between you and the other party.">It sounds like our divisions want the same thing to produce the best financial management software on the market. Am I right?</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_31" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A052.mp4" text-color="green" feed_txt="Good you are asking the other party to clarify their thoughts and you are creating common goals.">I understand completely. Our division operates the same way. How can we ensure that we will both get the bonuses we want this year?</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A052.mp4" text-color="red" feed_txt="You are failing to emphasize similarities between you and the other party and are focusing on your own concerns.">Our division operates the same way. I’m going to do whatever it takes to make sure my division gets their bonuses.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A052.mp4" text-color="yellow" feed_txt="You could make a greater effort to emphasize similarities between you and the other party.">That’s how our bonuses are determined as well. Regardless of the situation, if we don’t perform, we lose our bonuses</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_32" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A055.mp4" text-color="yellow" feed_txt="You need to clarify specific issues that need to be addressed.">I agree. The production process could use some work. Let’s decide what we’re going to do.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A056.mp4" text-color="red" feed_txt="You are failing to identify specific issues that need to be addressed in order to reach a solution.">What are you going to do to make sure your division is pulling their weight in the production process?</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A055.mp4" text-color="green" feed_txt="Good. You are identifying issues that need to be addressed in order to reach a solution.">I agree. Let’s talk about the communication problems our divisions have had. What can we do to eliminate future confusion?</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_33" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A057.mp4" text-color="yellow" feed_txt="You are requesting feedback, but your approach could be viewed as defensive.">Why don’t you just send someone from your division to our weekly development meetings?</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A050.mp4" text-color="red" feed_txt="You are failing to treat the other party with respect.">Then send someone from your division to our weekly development meetings, you’ve attended them before.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A057.mp4" text-color="green" feed_txt="You are requesting information from the other party.">Is it possible for you to send a representative to our weekly development meetings?</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_34" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A058.mp4" text-color="yellow" feed_txt="You are cooperating with the other party’s need but are failing to recognize the positive aspects of conflict.">I’ll have my teams start producing those from now on.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A058.mp4" text-color="red" feed_txt="You are failing to recognize the positive aspects of conflict.">Well, I suppose I can get those to you if you really think they’ll help. They are subject to change, though.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A058.mp4" text-color="green" feed_txt="Good you are recognizing  the positive aspects of conflict.">That won’t be a problem. I think the early the feature outlines will be helpful to my division as well, even though they are subject to change.</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_35" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A061.mp4" text-color="yellow" feed_txt="Although you are addressing the relevant issue, you could clarify the other party’s views by restating their thoughts.">What do you think should be done about the deadline issue?</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A061.mp4" text-color="green" feed_txt="You are failing to emphasize similarities between you and the other party and are focusing on your own concerns.">We touched on the issue of the deadlines earlier. You feel that I need to extend the feature report deadlines for my workers correct?</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A061.mp4" text-color="red" feed_txt="I’m sure you want to discuss the deadlines I set since you think they’re so unreasonable.">I’m sure you want to discuss the deadlines I set since you think they’re so unreasonable.</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_36" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A063.mp4" text-color="red" feed_txt="You are failing to maintain an open mind.">That’s not even an option. There’s a reason we set deadlines, and without them we get nowhere.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A063.mp4" text-color="green" feed_txt="Good. You are clearly communicating your reasons.">I don’t think I can adjust my deadlines. If I do, you’ll have to extend your deadlines as well, and that would push back the release dates of the products.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A063.mp4" text-color="yellow" feed_txt="You are identifying reasons that need to be addressed , but failing to keep an open mind.">I really don’t think that the deadlines can be adjusted. It would have too much of a negative effect on overall productivity.</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_37" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A064.mp4" text-color="yellow" feed_txt="Good you are asking the other party to clarify their thoughts and you are creating common goals.">I don’t think that‘s such a good idea.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A064.mp4" text-color="green" feed_txt="Good you are clarifying your thoughts for the other party.">I don’t sure if I feel comfortable going to him with this kind of request. You know he’s not going to be very pleased.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A064.mp4" text-color="red" feed_txt="You are failing to recognize the importance of requesting assistance.">You are failing to recognize the importance of requesting assistance.</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_38" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A066.mp4" text-color="red" feed_txt="You are being narrow minded and failing to recognize the benefit of seeking the assistance of others.">I disagree. I don’t want to look like I’m incapable of doing my job. You can talk to the vice president if you want but count me out.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A066.mp4" text-color="yellow" feed_txt="You are failing to consider the benefits of seeking the assistance from other.">I don’t know. That sounds a bit extreme. Why don’t we just try to keep up with the current deadline schedule?</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A066.mp4" text-color="green" feed_txt="You are cooperating with the other party’s needs and evaluating other options.">That’s true. If it would increase the overall quality of our software, I think it’s an option worth looking into.</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_39" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A070.mp4" text-color="red" feed_txt="You are being narrow minded and failing to offer solution options.">I’m not moving the deadlines. You’ve got to come up with a different idea.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A067.mp4" text-color="green" feed_txt="Good you are identifying issues that need to be addressed and clarifying the other party’s viewpoint by paraphrasing their thoughts.">Moving a deadlines is a definitely a possibility. However, I think that there are other solutions available.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A070.mp4" text-color="yellow" feed_txt="You are evaluating other options, but being narrow-minded.">I just don’t think we should move the deadlines. There’s got to be other alternative.</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_40" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A068.mp4" text-color="green" feed_txt="Good. You are recognizing the need to solicit the opinions of the other party.">I think we should have a joint meeting with all the tam leaders. They might have other ideas that we have overlooked.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A068.mp4" text-color="yellow" feed_txt="You should try to be more positive when discussing options.">I could we could talk to some of the team leaders to see what they think.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A068.mp4" text-color="red" feed_txt="You are being reluctant to seek the assistance of others.">I don’t know. I guess we could ask the team leaders for their input, but I hate to take them away from what they’re working on.</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_41" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A069.mp4" text-color="red" feed_txt="You are failing to recognize the positive aspects of conflict.">It’s going to be difficult for them to find time for this meeting.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A069.mp4" text-color="green" feed_txt="Good.  You are showing concern for the other party’s situation.">When is the most convenient time for your team leaders?</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A069.mp4" text-color="yellow" feed_txt="You could make a better attempt to meet the other party’s needs. ">We’ll have to determine a time that is good for the teams to meet.</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_42" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A073.mp4" text-color="red" feed_txt="You are being narrow minded and failing to recognize the benefit of seeking the assistance of others.">Well, I guess I have no choice. I’ll make my team leaders show upon Monday.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A073.mp4" text-color="yellow" feed_txt="You need to collaborate with the other party to solve the problem as a team.">If I have to send someone to the meeting, I’ll find a way to get them there, somehow.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A073.mp4" text-color="green" feed_txt="You are collaborating with the other party to reach a solution.">Let’s plan on Monday. If that’s not going to work for my team leaders, I’ll let you know.</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_43" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A074.mp4" text-color="yellow" feed_txt="You could be more specific about outlining a course of action.">Well, we’ve agreed that your division will have input into the development process, correct?</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A075.mp4" text-color="red" feed_txt="You are failing to summarize the responsibilities of each party in order to effectively implement the solution. ">No, I think we’ve discussed everything we need to. I’ll try to get my team leaders to that meeting.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A074.mp4" text-color="green" feed_txt="You are identifying a specific course of action to pursue.">Let’s go over each of our responsibilities. We’ve agreed to have a representative from your division attend the development meetings, correct?</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_44" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A079.mp4" text-color="yellow" feed_txt="You could be more specific about the issues discussed.">We also talked about the early features outlines.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A079.mp4" text-color="red" feed_txt="You are not encouraging a sense of unity.">You’ve got to have the features reports for your team, right?</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A079.mp4" text-color="green" feed_txt="Good. You are restating the issues that need to be addressed to reach a solution.">We also discussed your desire to have early features outlines submitted to your division.</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_45" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A076.mp4" text-color="yellow" feed_txt="You could emphasize the specific responsibilities of each party more.">I’ll talk to my division about getting those outlines together.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A076.mp4" text-color="red" feed_txt="You are specifically outlining the responsibilities of each party. You approach could also be viewed as defensive.">Don’t worry; we’ll have your reports ready.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A076.mp4" text-color="green" feed_txt="Good. You are clearly identifying the responsibilities of each party.">If you can make sure a representative from your division attends our development meetings, we’ll have early features reports ready for you to look at.</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_46" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A078.mp4" text-color="yellow" feed_txt="You could be more specific when expressing your thoughts.">Yes, I think that is the best thing to do at this point in time.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A078.mp4" text-color="green" feed_txt="You are demonstrating empathy and fostering communication. ">Of course I’m counting on the team leaders to give us some ideas so we can avoid having to approach him with a deadline adjustment request.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A078.mp4" text-color="green" feed_txt="Good. You are clarifying your thoughts.">Let’s see if the team leaders can give us any good ideas about enhancing productivity without adjusting the deadlines.</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_47" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A081.mp4" text-color="red" feed_txt="You are failing to establish a sense of unity with the other party.">Let’s hope it doesn’t come to that.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A080.mp4" text-color="green" feed_txt="Good. You are encouraging a sense of teamwork.">Fine. I’ll be happy to go talk to him with you, so we can both present our viewpoints.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A081.mp4" text-color="yellow" feed_txt="You could make a better attempt to meet the other party’s needs.">That’s true. We really won’t have any other options available.</div>     
                            </div>
                            <div style="padding: 10px;display: none;" id="main_48" class="main_divs">
                                <div><input type="radio" name="select" value="1" video-attr="videos\main\sim1movs\RCS1A090.mp4" text-color="yellow" feed_txt="You could be more specific about outlining a course of action.">Let’s just wait and see what happens.</div>
                                <div><input type="radio" name="select" value="2" video-attr="videos\main\sim1movs\RCS1A089.mp4" text-color="red" feed_txt="You are failing to summarize the responsibilities of each party in order to effectively implement the solution. ">If we can carry out the ideas we came up with today, I think we have a good chance of avoiding similar quality problems in the future.</div>
                                <div><input type="radio" name="select" value="3" video-attr="videos\main\sim1movs\RCS1A090.mp4" text-color="green" feed_txt="You are identifying a specific course of action to pursue.">Hopefully everything will work out for the best.</div>     
                            </div>
                            <div style="text-align: center;background-color: yellow;"><input type="button" name="speak" value="Speak" style="color:black;background-color: orange;" id="speak"/></div>
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
            <footer>
                <p>Copyright 2018-2019&copy; </p>
            </footer>
        </div>

    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/modernizr.2.5.3.min.js"></script>
    <script type="text/javascript" src="js/templatemo_script.js"></script>

    <script type="text/javascript">
        /*function DisplayVideo() {
            var vid = document.getElementById("sim_video");
            vid.src = this.value;
            return false;
        }
        document.getElementById("Vclips").onchange = DisplayVideo;*/
        $(document).ready(function(){
           $('#speak').click(function(){
               var checked_val = $('input[name=select]:checked');
               var checked_value = checked_val.val();
               if(typeof(checked_value) !== 'undefined' && checked_value !== ''){
                   var parent_div = checked_val.parent().parent().attr('id');
                   var parent_divs = parent_div.split('_');
                   var next_div = parseInt(parent_divs[1])+1;
                   var vid = document.getElementById("sim_video");
                   var color_text = checked_val.attr('text-color');
                   var text_feed = checked_val.attr('feed_txt');
                   vid.src = checked_val.attr('video-attr');
                   $('.color_feed').css('opacity','0.3');
                   $('.'+color_text+'_feed').css('opacity','1.0');
                   setTimeout(function(){
                       $('#feedback_text').html(text_feed);
                   },500);
                   $('#feedback_text').html(text_feed);
                   $('#feedback_text').removeAttr('class');
                   $('#feedback_text').addClass(color_text);
                   $('.main_divs').hide();
                   $('#main_'+next_div).show();
                   $('#sim_video').removeAttr('loop');
                   
               }
               else{
                   alert("Please select atleast one.");
               }
           });            
        });
    </script>
</body>
</html>


<?php
session_destroy();

?>
