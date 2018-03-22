<h1 id="scrapingamazoncategorieswithscraping_amazorepository">Scraping amazon categories with 'scraping_amazo' repository</h1>

<h2 id="description">Description</h2>

<p>The code use 'simple<em>html</em>dom.php' parser to extract relevant details of product from amazon.
The specific elements are identified by uniqe identifier,class,attribiues
and division and returns the result in csv format.</p>

<h2 id="howtorun">How to run</h2>

<p>To run this code:</p>

<ul>
<li>CLone or download code(in the htdocs folder).</li>

<li>Start apache server and mySQL server on xxamp.</li>

<li>Create user account with privileges for db if not created .</li>

<li>Create db 'amazon<em>scrape' or whateever name and enter the credetials in 'sql</em>connection.php'.</li>

<li>Run create table located in 'funcs_mySQL.php' or create it manually on php my admin</li>

<li>Run the 'display.php' on broawser.</li>
</ul>
