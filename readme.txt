= Community =

== Architecture / Modules ==

=== Users and Groups ===

* [Todo] Searchable user list (started)
* [Todo] User profile
* [Todo] User settings
* [Todo] Create Group
* [Todo] Group profile
* [Todo] Group settings
* [Todo] Join group
* [Todo] Confirm join group (Use functionality from confirm join buddy!)

=== Buddies ===

* Add Buddy
* Confirm Buddy
* [Todo] Delete Buddy
* [Todo] Buddy list
* [Todo] Show relation between user and buddy

=== User credits ===

* [Todo] Create interface for credits-system
* [Todo] Implement credits algorithm

== Questions and Problems ==

=== Interfaces ===

* Which interfaces should be implemented to implement community functionality on a site?
** Forum --> go to user page
** Posts of users --> user credits

=== API ===

How could an API for community issues look like?
* Only basic functions (e.g. addUser())?
* Include view options (e.g. showBuddyLink())?
* One class only with helper functions?
* Problem: MVC --> Deviding functions into three groups
** For API issues: include complete framework --> not an API
** Use API functions in MVC: code is no more separated

=== MVC ===

* How to devide code into the three layers
** Domain Driven Design: all domain-relevant-function should be put into model
** For API: enough to use model?
* No output created by model
** Possibility of combining views with lib/div?
** Extending or Using classes could "extend" their functionality by including community models and views

* Idea: Creation of two superclasses: community_model and community_view
** Implementing all business and presentation logic there
** Controller logic should not be part of an API - shouldn't it?
** Use these two superclasses as an API

=== Configuration ===

* How many TS code should be used
* TS versus Flexform Code
* Big static template (like timtab) does all the configuration
* versus: Small plugins, included on different pages using flexform for configuration

=== Access Controll ===

* Use typo3 for access controll?
* Include "SuperController" handling global access controll for all small plugins

=== List-helper ===

* How to combine lib/div pagebrowser with list?
* Sorting: not coupled with database-query

== Ideas ==

=== User settings / profile page ===

* Use TS to make a setup of fields to display / edit
** e.g. plugin....userSettingsFields = table_name.field_name
* Let user decide which fields to display 
** user_privacy table including
*** table_name
*** field_name
*** privacy_flag

=== Messaging ===

* Generic messaging system needs page_id, content_id and uid of content
* Giving a commenting-form those three values enables comments for every kind of content
* Possibility for configuration with TS???
