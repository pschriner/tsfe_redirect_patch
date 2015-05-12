
.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. _start:

=============================================================
tsfe_redirect_patch
=============================================================

:Language:
	en

:Description:
	$GLOBALS['TSFE'] is the prime entry point for all frontend rendering in TYPO3.
	This extension works around a specific bug in the corresponding TYPO3 core class.

:Copyright:
	Die Medialen GmbH, 2015

:Author:
	Patrick Schriner, Die Medialen GmbH

:Email:
	patrick.schriner@diemedialen.de

:License:
	This document is published under the Open Content License
	available from http://www.opencontent.org/opl.shtml

The content of this document is related to TYPO3

\- a GNU/GPL CMS/Framework available from `www.typo3.org <http://www.typo3.org/>`_

What does it do?
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

This extension works around a bug in the TyposcriptFrontendController which
causes redirects when a page is inaccessible, but has shortcuts or mountpoints
in its rootline. The bug is caused by getPageAndRootline() never unsetting
$originalShortcut or $originalMountpoint, even if the target page has nothing
to do with the shortcut or mountpoint. This extension wraps the original getPageAndRootline()
and checks whether the targeted page is actually above the shortcut / mountpoint pages and 
correctly unsets $originalShortcut or $originalMountpoint.