<?php require_once 'h.php'; ?>
  <div class="row">
    <div class="span8">
      <h1>We are hiring!</h1>
      <hr>
      <div class="job-info">
        <h2>Software Engineer - Front-End</h2>
        <h6 style="margin-bottom:30px;">Full-Time — Debrecen, Hungary</h6>
        
        <strong>About this Job</strong><br> Twitter is looking for engineers to focus on front-end development. You should have a passion for shipping elegant, responsive web interfaces that will be used by millions of people.<br> <br> There are currently openings for Front-End Engineers on multiple teams.<br>&nbsp; <br> <strong>Responsibilities</strong><br>
        <ul>
          <li>Write front-end code in Ruby, HTML/CSS, and Javascript<br> </li>
          <li>Implement new features and optimize existing ones from controller-level to UI<br> </li>
          <li>Work closely with, and incorporate feedback from, product management, interaction designers, and back-end engineers<br> </li>
          <li>Rapidly fix bugs and solve problems<br> </li>
          <li>Pro-actively look for ways to make Twitter better</li>
        </ul>
        <strong>Qualifications</strong><br>
        <ul>
          <li>Demonstrable experience building world-class, consumer web application interfaces<br> </li>
          <li>Expert Javascript/HTML/CSS/Ajax coding skills<br> </li>
          <li>Excellent programming skills in Ruby, Java, Python, or PHP<br> </li>
          <li>Disciplined approach to testing and quality assurance<br> </li>
          <li>Strong command of web standards, CSS-based design, cross-browser compatibility<br> </li>
          <li>Good understanding of web technologies (HTTP, Apache) and familiarity with Unix/Linux<br> </li>
          <li>Knowledgeable foundation in interaction design principles<br> </li>
          <li>Great written communication and documentation abilities</li>
        </ul>
        <strong>Desired Skills</strong><br>
        <ul>
          <li>Visual-design skills</li>
          <li>B.S. or higher in Computer science or equivalent<br> </li>
          <li>Active user of Twitter</li>
        </ul>
        <p style="margin-top:30px;">
        <a href="apply.php" class="btn btn-primary btn-large">Apply for this job &rarr;</a>
        </p>
      </div>      
    </div>
    <div class="span4 details-pane" style="height:auto; margin-top:55px;">
      <ul class="nav nav-list jobs-list">
        <li class="nav-header">Current positions</li>
        <hr style="margin:2px auto 8px auto;">
        <?php foreach (range(0,5) as $key => $value): ?>
          <li>
            <a href="#" style="font-size:1.2em"><i class="icon-user" style="margin-right:5px; margin-top:0px;"></i>Position <?php echo $key+1 ?></a>
          </li>
        <?php endforeach ?>
      </ul>
    </div>
  </div>

<?php require_once 'f.php'; ?>