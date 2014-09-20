<!doctype html>
<html>

<head>
    <title>Notes</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link href="http://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet" type="text/css"/>
</head>
<body>
    <header class='col-md-12'>
        <a href="./" class="col-md-12"><button>Home</button></a>
        <a class="col-md-12" href="./?signout=true">
            <button>Log-out</button>
        </a>
        <h1 class="col-md-4">Notes:</h1>
        
    </header>
    <form class="col-md-offset-3 col-md-6 text-right" action="./" method="get">
        <input type='hidden' name='clientId' value='<?=$_GET['clientId'] ?>' />
        <input name="title" class="form-control space" type="text" placeholder="Title">
        <textarea name="message" class="form-control space" type="text" col='30' rows="10" placeholder="Your message here."></textarea>
        <button class="space btn btn-default">Submit</button>
    </form>
    <section class="col-md-12">
        <? foreach($messages as $obj){ ?>
        <article class="col-md-offset-3 col-md-6">
            <form action="./" method="get">
                <input class='editors form-control space' name="title" value="<?=$obj['title']?>" />
                <textarea class='editors form-control space' name="message"><?=$obj[ 'message']?></textarea>
                <input type="hidden" name="update" value="true" />
                <input type="hidden" name="id" value="<?=$obj['id']?>" />
                <a class="col-md-1" href="./?delete=true&id=<?=$obj['id']?>&clientId=<?=$obj['clientId'] ?>">Delete</a>
                <button class="col-md-offset-11 btn btn-default">Save</button>
            </form>
        </article>
        <? } ?>
    </section>
</body>

</html>
