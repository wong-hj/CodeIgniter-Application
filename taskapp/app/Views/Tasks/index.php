<!-- Main Page for tasks -->

<?= $this->extend("layouts/default")?>

<!-- section for title -->
<?= $this->section("title")?>

    Tasks

<?= $this ->endSection() ?>
<!-- end of section for title -->

<!-- section for content -->
<?= $this->section("content")?>

    <h1>Welcome to Tasks</h1>
    <a href="<?= site_url("/tasks/new")?>">&rsaquo; Add New Task</a>
    
    <!-- existence of tasks variable will return boolean value if found = true if not found = FALSE -->
    <!-- if $tasks is true then run the following code -->
    <div>
        <label for="query">Search</label>
        <input type="query" id="query" name="query" placeholder="Search">
    </div>
    <?php if($tasks): ?>
        <ul>
            <!--for loop every $tasks-->
            <?php foreach($tasks as $task): ?>

                <li>
                    <a href="<?= site_url("/tasks/show/" . $task->id)  ?>">
                        <?= esc($task->description) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        
        <!-- links pagination simpleLinks (newer or older) -->
        <?= $pager->simpleLinks() ?>
        
        <!-- links pagination links (page numbers eg 1 2 3) -->
        <!-- $pager->links() -->

    <?php else: ?>
        <p>No Tasks Found</p>
    <?php endif ?>

    
    <script src="<?= site_url("/js/auto-complete.min.js")?>"></script>

    <script>
        var searchUrl = "<?= site_url('/tasks/search?q=')?>";
        var showUrl = "<?= site_url('/tasks/show/')?>";
        
        var data;
        var i;


        var searchAutoComplete = new autoComplete({
            selector: 'input[name="query"]',
            cache: false,
            source: function(term, response){

                var request = new XMLHttpRequest();

                request.open('GET', searchUrl + term, true);

                request.onload = function() {

                    data = JSON.parse(this.response);

                    i = 0;

                    var suggestions = data.map(task => task.description);

                    response(suggestions);

                };

                request.send();

            },
            renderItem: function (item, search) {

                var id = data[i].id;

                i++;

                return "<div class='autocomplete-suggestion' data-id='" + id + "'>" + item + "</div>";
            },
            onSelect: function(e, term, item){

                window.location.href = showUrl + item.getAttribute('data-id');
            }
        });
        
    </script>

<?= $this ->endSection() ?>

<!-- end of section for content -->