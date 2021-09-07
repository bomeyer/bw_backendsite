==================
Developer Corner
==================

Target group: **Developers**

There are already three identical modules for up to three different icons to be
placed in the Backend.

You can clone the project and duplicate the ModuleController classes to create
even more. Don't forget to add a registerModule call to ext_tables.php for each one.


Hooks
=======

There are no hooks. There is simply not enough code to add some.



Changes
=======

Version 1.2.0
-------------

In version 1.2.0 the rendering was changed to use Fluid templates. This enables
the extension to render the iFrame element by itself. This leaves a small border 
around the content colored by the TYPO3 backend style sheet. You may have to 
either change the default background color of TYPO3 or your backend pages 
template to adjust to this.

The default action for the modules were changed to 'Index' rather than 'List'.