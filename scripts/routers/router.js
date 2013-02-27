/*global define*/
define([
	'jquery',
	'backbone',
	'collections/todos',
	'common'
], function ($, Backbone, Todos, Common) {
	'use strict';

	var Workspace = Backbone.Router.extend({
		routes: {
			'*filter': 'setFilter',
			'*templates': 'testNow'
		},

		setFilter: function (param) {
			// Set the current filter to be used
			Common.TodoFilter = param.trim() || '';

			// Trigger a collection filter event, causing hiding/unhiding
			// of the Todo view items
			Todos.trigger('filter');
		}


		testNow: function () {
			
				console.log('ass');
		}

	});

	return Workspace;
});
