/*global require*/
'use strict';

// Require.js allows us to configure shortcut alias
require.config({
	baseUrl: "../../scripts",
	// The shim config allows us to configure dependencies for
	// scripts that do not call define() to register a module
	shim: {
		underscore: {
			exports: '_'
		},
		backbone: {
			deps: [
				'underscore',
				'jquery'
			],
			exports: 'Backbone'
		},
		backboneLocalstorage: {
			deps: ['backbone'],
			exports: 'Store'
		}
	},
	paths: {
		jquery: 'vendor/jquery/jquery.min',
		underscore: 'vendor/lodash/dist/lodash.min',
		backbone: 'vendor/backbone/backbone',
		backboneLocalstorage: 'vendor/Backbone.localStorage/backbone.localStorage-min',
		text: 'vendor/text/text'
	}
});

require([
	'backbone',
	'views/app'
], function (Backbone, AppView) {
	/*jshint nonew:false*/
	// Initialize routing and start Backbone.history()
//	new Workspace();
//	Backbone.history.start();

	// Initialize the application view
	new AppView();
});
