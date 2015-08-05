<style>

body {
	background: #eee;
	margin: 0px;
	padding: 0px;
}

.newscol {
    -webkit-column-count: 2; /* Chrome, Safari, Opera */
    -moz-column-count: 2; /* Firefox */
    column-count: 2;

    -webkit-column-gap: 40px; /* Chrome, Safari, Opera */
    -moz-column-gap: 40px; /* Firefox */
    column-gap: 40px;

    -webkit-column-rule-style: solid; /* Chrome, Safari, Opera */
    -moz-column-rule-style: solid; /* Firefox */
    column-rule-style: solid;

    -webkit-column-rule-width: 1px; /* Chrome, Safari, Opera */
    -moz-column-rule-width: 1px; /* Firefox */
    column-rule-width: 1px;

    -webkit-column-rule-color: #aaa; /* Chrome, Safari, Opera */
    -moz-column-rule-color: #aaa; /* Firefox */
    column-rule-color: #aaa;

    font-size: 18px;
    color: #444;
    text-align: justify;

}

.art {
	background: #00AD9E;
}

.music {
	background: #DB0046;
}

.poetry {
	background: #4A3DDB;	
}

.design {
	background: #9A348E;	
}

h2 {
	text-align: center;
    -webkit-column-span: all; /* Chrome, Safari, Opera */
    column-span: all;

    font-size: 32px;

    padding: 15px;
    margin:0;
    margin-bottom: 10px;
    color: #eee;
}

p {
	margin: 0px;
	padding: 10px;
}

p:first-of-type {
    font-weight: bold;
    font-size: 20px;
    padding-top: 0px;
}

p:first-of-type::first-letter {
    font-size: 86px;
    float: left;
    color: #424f5c;
    margin: 4px 8px;
    margin-bottom: -1px;
    line-height: 66px;
    padding-bottom: 0px;
}

/*fixed header*/
h2 {
	position:fixed;
	top: 0;
	left:0;
	width: 100%;
	box-shadow: 0px 0px 30px #333;
}

.newscol {
	padding-top: 75px;
}

</style>

<div class="newscol">

	<h2 class="<?php echo $query['cat']; ?>"><?php echo $query['title']; ?></h2>

	<?php echo $query['text']; ?>

</div>