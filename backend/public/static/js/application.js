window.Todos = Ember.Application.create({
    LOG_TRANSITIONS: true
});
/*Todos.ApplicationAdapter = DS.FixtureAdapter.extend();*/

Todos.ApplicationAdapter = DS.RESTAdapter.extend({
    namespace: 'api',
    host: 'localhost:8000'
});