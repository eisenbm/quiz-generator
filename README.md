# Quiz Generator

Generate a printed version of an exam or quiz bases on data found in a JSON file. Support for:
- Multiple Choice
- True / False
- Fill-in-the-Blank

## Instructions
1. Create a file named `exam.json` using the format of the example provided in `exam.json.example`.
1. Use `docker compose up -d` to launch application.
1. Access pages using the following links:
    * [Home](http://127.0.0.1/)
    * [Questions](http://127.0.0.1/questions.php)
    * [Shuffle](http://127.0.0.1/shuffle.php)
    * [Answer Key](http://127.0.0.1/answer.php)

To generate a new exam, visit [Home](http://127.0.0.1/). This will set the exam title, randomize the questions, and set exam version. Visting [Shuffle](http://127.0.0.1/shuffle.php) while display the questions on the page. Printing the page will produce a printable version of the exam. Visiting [Answer](http://127.0.0.1/answer.php), which display an answer key for the specific version of the exam. To create a new version, return to Home. 

The [Questions](http://127.0.0.1/questions.php) page display questions and answers without any randomization.  

