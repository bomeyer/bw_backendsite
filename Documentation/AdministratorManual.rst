============================
Administrator Manual
============================

Target group: **Administrators**



Installation
=============

After installation you can edit the extension settings

* pageID: either an integer value for the page id you want to display or a string
  pointing to an URL of your choice. If you choose the same domain as your
  backend login the user can make use of the admin panel and inline editing.

.. figure:: Images/AdministratorManual/extconf-integer.png
		:alt: Integer parameter

		Page ID as integer

.. figure:: Images/AdministratorManual/extconf-url.png
		:alt: String parameter

		Page URL as string

You may set up a separate page tree just for backend users. Users must have
access to the page, so this page tree must be mounted for them.

.. figure:: Images/AdministratorManual/backend-site.png
		:alt: Page tree

		A sample page tree



Configuration
=======================

Additionally, you may override settings with userTS.

.. figure:: Images/AdministratorManual/userTS.png
		:alt: User Typoscript override

		Override in userTS (groupTS)


* 

