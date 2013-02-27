/*global define*/
define([
	'underscore',
	'backbone',
	'backboneLocalstorage',
	'models/admin'
], function (_, Backbone, Store, Admin) {
	'use strict';

	var AdminsCollection = Backbone.Collection.extend({
		// Reference to this collection's model.
		model: Admin,

		// Save all of the todo items under the `"todos"` namespace.
		localStorage: new Store('skeletor-admin'),

		// Filter down the list of all todo items that are finished.
		completed: function () {
			return this.filter(function (todo) {
				return admin.get('completed');
			});
		},

	});

	return new AdminsCollection();

});