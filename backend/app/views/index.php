<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Todo</title>
    <link rel="stylesheet" href="../static/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <script src="http://emberjs.com.s3.amazonaws.com/getting-started/jquery.min.js"></script>
    <script src="http://emberjs.com.s3.amazonaws.com/getting-started/handlebars.js"></script>
    <script src="http://emberjs.com.s3.amazonaws.com/getting-started/ember.js"></script>
    <script src="http://emberjs.com.s3.amazonaws.com/getting-started/ember-data.js"></script>
    <script src="static/js/application.js"></script>
    <script src="static/js/router.js"></script>
    <script src="static/js/models/todo.js"></script>
    <script src="static/js/controllers/todos_controller.js"></script>
    <script src="static/js/controllers/todo_controller.js"></script>
    <script src="static/js/views/edit_todo_view.js"></script>
</head>
<body>

<script type="text/x-handlebars" data-template-name="todos/index">
  <ul id="todo-list">
    {{#eachIndexed todo in model itemController="todo"}}
      <li {{bind-attr class="todo.isCompleted:completed todo.isEditing:editing"}}>
        {{#if todo.isEditing}}
          {{edit-todo class="edit" value=todo.title focus-out="acceptChanges" insert-newline="acceptChanges"}}
        {{else}}
          {{input type="checkbox" checked=todo.isCompleted class="toggle"}}
          <label {{action "editTodo" on="doubleClick"}}>
          {{index_1}}.{{todo.title}}
          </label><button {{action "removeTodo"}} class="destroy"></button>
        {{/if}}
      </li>
    {{/eachIndexed}}
  </ul>
</script>


<script type="text/x-handlebars" data-template-name="todos">
<section id="todoapp">
    <header id="header">
        <button id="addTaskBtn" {{action "openAddOption"}}><i class="fas fa-plus"></i></button>
        {{#if isAdding}}
            {{input
            type="text"
            id="new-todo"
            placeholder="משימה חדשה"
            value=newTitle
            action="createTodo"
            focus-out="acceptChanges"
            insert-newline="acceptChanges"}}
        {{else}}
            <label id="taskTitle">משימות</label>
        {{/if}}
    </header>
    <section id="main">
        {{outlet}}
    </section>

    <footer id="footer">
        <span id="todo-count">
            <strong>לסיום: {{remaining}}</strong>
        </span>
        <span id="todo-count">
            <strong>הושלמו: {{done}}</strong>
        </span>
        <span id="todo-count">
            <strong>סה"כ: {{total}}</strong>
        </span>

    </footer>
</section>
 </script>
</body>
</html>