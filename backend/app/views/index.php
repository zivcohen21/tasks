<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ember.js • TodoMVC</title>
    <link rel="stylesheet" href="../static/css/style.css">


    <script src="http://emberjs.com.s3.amazonaws.com/getting-started/jquery.min.js"></script>
    <script src="http://emberjs.com.s3.amazonaws.com/getting-started/handlebars.js"></script>
    <script src="http://emberjs.com.s3.amazonaws.com/getting-started/ember.js"></script>
    <script src="http://emberjs.com.s3.amazonaws.com/getting-started/ember-data.js"></script>
    <script src="static/js/app.js"></script>
    <script src="static/js/router.js"></script>
    <script src="static/js/models/todo.js"></script>
    <script src="static/js/controllers/todos_controller.js"></script>
    <script src="static/js/controllers/todo_controller.js"></script>
    <script src="static/js/views/edit_todo_view.js"></script>
</head>
<body>
<script type="text/x-handlebars" data-template-name="todos/index">
  <ul id="todo-list">
    {{#each todo in model itemController="todo"}}
      <li {{bind-attr class="todo.isCompleted:completed todo.isEditing:editing"}}>
        {{#if todo.isEditing}}
          {{edit-todo class="edit" value=todo.title focus-out="acceptChanges" insert-newline="acceptChanges"}}
        {{else}}
          {{input type="checkbox" checked=todo.isCompleted class="toggle"}}
          <label {{action "editTodo" on="doubleClick"}}>{{todo.title}}</label><button {{action "removeTodo"}} class="destroy"></button>
        {{/if}}
      </li>
    {{/each}}
  </ul>
</script>

<script type="text/x-handlebars" data-template-name="todos">

  <section id="todoapp">
    <header id="header">
      <h1>todos</h1>
      {{input type="text" id="new-todo" placeholder="What needs to be done?"
              value=newTitle action="createTodo"}}
    </header>

      <section id="main">
        {{outlet}}
        <input type="checkbox" id="toggle-all">
      </section>

      <footer id="footer">
        <span id="todo-count">
          <strong>{{remaining}}</strong> {{inflection}} left</span>
        <ul id="filters">
          <li>
            <a href="all" class="selected">All</a>
          </li>
          <li>
            <a href="active">Active</a>
          </li>
          <li>
            <a href="completed">Completed</a>
          </li>
        </ul>

        <button id="clear-completed">
          Clear completed (1)
        </button>
      </footer>
  </section>

  <footer id="info">
    <p>Double-click to edit a todo</p>
  </footer>

</script>
</body>
</html>