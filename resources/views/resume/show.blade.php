<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">     
    <title>{{ $information->name }}'s Online Resume</title>

    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5;
        overflow-y: auto; 
      }

      .resume-container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        max-width: 700px;
        margin: 30px auto;
        position: relative;
      }

      .header {
        text-align: center;
        padding: 20px;
      }

      h1 {
        color: #336699; 
        font-size: 2.5em; 
        margin-bottom: 10px;
        position: relative;
        z-index: 1; 
      }

      .profile {
        border-radius: 50%;
        width: 150px;
        height: 150px;
        margin-bottom: 15px;
        border: 4px solid #336699; 
        position: relative;
        z-index: 1; 
      }

      .contact-info {
        margin: 10px 0;
        font-size: 1.1em;
        color: #336699; 
        position: relative;
        z-index: 1; 
      }

      hr {
        border: none;
        border-top: 1px solid #ddd;
        margin: 20px 0;
      }

      .section {
        margin: 20px 0;
        position: relative;
        border-radius: 10px;
        padding: 20px;
        color: #336699; 
        overflow: hidden; 
      }

      .objectives {
        background: linear-gradient(135deg, #ff9a9e, #fad0c4); 
      }

      .education {
        background: linear-gradient(135deg, #fbc2eb, #a6c1ee); 
      }

      .employment {
        background: linear-gradient(135deg, #ffecd2, #fcb69f);
      }

      .skills {
        background: linear-gradient(135deg, #d9a7c7, #fffcdc); 
      }

      .references {
        background: linear-gradient(135deg, #fbc2eb, #ff9a9e); 
      }

      h2 {
        font-size: 1.5em;
        margin-bottom: 10px;
        position: relative;
        z-index: 1; 
      }

      h2::after {
        content: "";
        display: block;
        width: 50px;
        height: 4px;
        background-color: #336699; 
        margin-top: 5px;
      }

      .objectives p, .section p {
        line-height: 1.6;
        margin-bottom: 15px;
        position: relative;
        z-index: 1; 
      }

      .skills {
        display: flex;
        flex-wrap: wrap;
      }

      .skill {
        background-color: rgba(255, 255, 255, 0.9); 
        color: #336699; 
        padding: 10px;
        border-radius: 5px;
        margin: 5px;
        flex: 1 1 45%; 
        position: relative;
        z-index: 1; 
      }

      .references {
        margin-top: 20px;
      }

      .references h4, .references p {
        margin-top: 10px;
        color: #336699; 
        position: relative;
        z-index: 1; 
      }

     
      .triangle {
        position: absolute;
        width: 0;
        height: 0;
        border-left: 20px solid transparent;
        border-right: 20px solid transparent;
      }

      .triangle.bottom {
        border-top: 20px solid rgba(255, 255, 255, 0.4); 
        left: 20px;
        bottom: -20px;
      }

      
      .wavy-line {
        position: absolute;
        bottom: -15px; 
        left: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"><path d="M0 30 C 50 0, 50 60, 100 30 S 200 0, 300 30 S 400 60, 500 30 S 600 0, 700 30 L 700 100 L 0 100 Z" fill="rgba(255, 255, 255, 0.3)" /></svg>') no-repeat center;
        z-index: 0; 
      }

      
      @media (max-width: 600px) {
        .resume-container {
          padding: 15px;
        }

        h1 {
          font-size: 2em;
        }

        .profile {
          width: 120px;
          height: 120px;
        }
      }
    </style>
</head>

<body>
    <div class="resume-container">
        <div class="header">
            <h1>{{ $information->name }}</h1>
            <img src="https://raw.githubusercontent.com/Pixie2100/Resume/Prelims/Picture.png" alt="Profile Picture" class="profile">
            <div class="contact-info">
                <p>
                    <img src="https://raw.githubusercontent.com/Pixie2100/Resume/Prelims/Email.png" alt="Email Icon"> 
                    {{ $information->email }}
                </p>
                <p>
                    <img src="https://raw.githubusercontent.com/Pixie2100/Resume/Prelims/Phone.png" alt="Phone Icon"> 
                    {{ $information->phone }}
                </p>
            </div>
        </div>
        
        <hr>

        <div class="section objectives">
            <h2>Objectives</h2>
            <p>{{ $objective->objective }}</p>
            <div class="wavy-line"></div>
        </div>

        <div class="section education">
            <h2>Education</h2>
            @foreach ($education->unique(function($edu) {
            return $edu->degree . $edu->years . $edu->school;
            }) as $edu)
            <p>{{ $edu->school }}</p>
            <p>{{ $edu->degree }}</p>
            <p>({{ $edu->years }})</p>
            @endforeach
            <div class="wavy-line"></div>
        </div>

        <div class="section employment">
            <h2>Employment History</h2>
            @foreach ($employment as $job)
                <p>{{ $job->job_title }} ({{ $job->year }})</p>
                <h4>Company: {{ $job->company }}</h4>
            @endforeach
            <div class="wavy-line"></div>
        </div>

        <div class="section skills">
            <h2>Skills</h2>
            @foreach ($skills as $skill)
                <div class="skill">{{ $skill->skill }}</div>
            @endforeach
            <div class="wavy-line"></div>
        </div>

        <div class="section references">
            <h2>References</h2>
            @foreach ($references as $ref)
                <h4>{{ $ref->name }}</h4>
                <p>
                    <img src="https://raw.githubusercontent.com/Pixie2100/Resume/Prelims/Phone.png" alt="Phone Icon"> {{ $ref->phone }}
                </p>
                <p>
                    <img src="https://raw.githubusercontent.com/Pixie2100/Resume/Prelims/Email.png" alt="Email Icon"> {{ $ref->email }}
                </p>
            @endforeach
            <div class="wavy-line"></div>
        </div>
    </div>
</body>
</html>
