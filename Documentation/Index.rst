..  Editor configuration
	...................................................
	* utf-8 with BOM as encoding
	* tab indent with 4 characters for code snippet.
	* optional: soft carriage return preferred.

.. Includes roles, substitutions, ...
.. include:: _IncludedDirectives.rst

=================
Extension Name
=================

:Extension name: BW Backend Site
:Extension key: bw_backendsite
:Version: 1.2.0
:Description: manuals covering TYPO3 extension "BW Backend Site"
:Language: en
:Author: Mark Boland
:Creation: 2021-09-06
:Generation: 12:19
:Licence: Open Content License available from `www.opencontent.org/opl.shtml <http://www.opencontent.org/opl.shtml>`_

The content of this document is related to TYPO3, a GNU/GPL CMS/Framework available from `www.typo3.org
<http://www.typo3.org/>`_

**Table of Contents**

.. toctree::
	:maxdepth: 2

	ProjectInformation
	UserManual
	AdministratorManual
	TyposcriptReference
	DeveloperCorner
	RestructuredtextHelp

.. STILL TO ADD IN THIS DOCUMENT
	@todo: add section about how screenshots can be automated. Pointer to PhantomJS could be added.
	@todo: explain how documentation can be rendered locally and remotely.
	@todo: explain what files should be versionned and what not (_build, Makefile, conf.py, ...)

.. include:: ../Readme.rst


What does it do?
=================

Shows a page in the backend. This can be a page of your page tree or an arbitrary
URL. In combination with backend user access control you can create your own
portal site and make it the starting module of your TYPO3 installation. You can
add all available TYPO3 plugins (like News, Forums, Downloads) to enhance your
editor's experience.

