=========================
Configuration Reference
=========================

Extension Configuration
=======================

.. ..................................
.. container:: table-row

	Property
		pageID

	Data type
		mixed

	Description
		Page uid (if integer) or URL (string) to show.

	Default
		1

.. container:: table-row

	Property
		menu

	Data type
		string

	Description
		Module category to use. Either one of the default ones (user, system,
		help, tools) or a custom one to group your backend sites together.

	Default
		user

.. container:: table-row

	Property
		locallang

	Data type
		mixed

	Description
		Page uid (if integer) or URL (string) to show.

	Default
		LLL:EXT:bw_backendsite/Resources/Private/Language/locallang_mod1.xlf

.. container:: table-row

	Property
		icon

	Data type
		string

	Description
		Path to an image to use for this module

	Default
		EXT:bw_backendsite/Resources/Public/Images/icon-backendsite.svg

.. container:: table-row

	Property
		pageID_mod2

	Data type
		mixed

	Description
		Page uid (if integer) or URL (string) to show.

	Default
		(empty)

.. container:: table-row

	Property
		menu_mod2

	Data type
		string

	Description
		Module category to use. Either one of the default ones (user, system,
		help, tools) or a custom one to group your backend sites together.

	Default
		help

.. container:: table-row

	Property
		locallang_mod2

	Data type
		mixed

	Description
		Page uid (if integer) or URL (string) to show.

	Default
		LLL:EXT:bw_backendsite/Resources/Private/Language/locallang_mod2.xlf

.. container:: table-row

	Property
		icon_mod2

	Data type
		string

	Description
		Path to an image to use for this module

	Default
		EXT:bw_backendsite/Resources/Public/Images/icon-help.svg

.. container:: table-row

	Property
		pageID_mod3

	Data type
		mixed

	Description
		Page uid (if integer) or URL (string) to show.

	Default
		(empty)

.. container:: table-row

	Property
		menu_mod3

	Data type
		string

	Description
		Module category to use. Either one of the default ones (user, system,
		help, tools) or a custom one to group your backend sites together.

	Default
		tools

.. container:: table-row

	Property
		locallang_mod3

	Data type
		mixed

	Description
		Page uid (if integer) or URL (string) to show.

	Default
		LLL:EXT:bw_backendsite/Resources/Private/Language/locallang_mod3.xlf

.. container:: table-row

	Property
		icon_mod3

	Data type
		string

	Description
		Path to an image to use for this module

	Default
		EXT:bw_backendsite/Resources/Public/Images/icon-stop.svg


TypoScript Reference
=====================

userTS
------

plugin.tx_bwbackendsite.<property>
		pageID

	Data type
		mixed

	Description
		Override page uid (if integer) or URL (string) to show.

	Default
		1

.. container:: table-row

	Property
		module2.pageID

	Data type
		mixed

	Description
		Override page uid (if integer) or URL (string) to show.

	Default
		(empty)

.. container:: table-row

	Property
		module3.pageID

	Data type
		mixed

	Description
		Override page uid (if integer) or URL (string) to show.

	Default
		(empty)

.. container:: table-row

	Property
		module2.pageID

	Data type
		mixed

	Description
		Override page uid (if integer) or URL (string) to show.

	Default
		(empty)

.. container:: table-row

	Property
		module3.pageID

	Data type
		mixed

	Description
		Override page uid (if integer) or URL (string) to show.

	Default
		(empty)

FAQ
====

I set my the pageID of module2, but the module is not displayed
	You must set a `fallback` page id in the extension configuration first. There
	will be no module2 created if you fail to do that. You are then free to
	override this id (or URL) to your liking.

