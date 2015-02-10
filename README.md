ChooseYourOwnFormat - a Vanilla Forums plugin that lets users choose Markdown or HTML formats when posting.

* [Releases](https://tbd)
* [Source](https://github.com/JasonBarnabe/ChooseYourOwnFormat)

Installation
------------

1. Download and place in your `plugins` folder.
2. Copy `config-example.php` to `config.php`. Customize if needed.
3. If you're using Vanilla 2.1, make the changes below to `applications/vanilla/controllers/class.postcontroller.php`:

```php
--- applications/vanilla/controllers/class.postcontroller.php  2014-09-14 21:39:28.401778948 -0500
+++ applications/vanilla/controllers/class.postcontroller.php  2014-09-14 22:13:57.945899979 -0500
@@ -624,6 +624,7 @@
                   $this->Comment->InsertPhoto = $Session->User->Photo;
                   $this->Comment->DateInserted = Gdn_Format::Date();
                   $this->Comment->Body = ArrayValue('Body', $FormValues, '');
+                  $this->Comment->Format = GetValue('Format', $FormValues, C('Garden.InputFormatter'));
                   $this->View = 'preview';
                } elseif (!$Draft) { // If the comment was not a draft
                   // If Editing a comment 
@@ -758,7 +759,6 @@
          $this->Comment = $this->DraftModel->GetID($DraftID);
       }

-      $this->Form->SetFormValue('Format', GetValue('Format', $this->Comment));
       $this->View = 'editcomment';
       $this->Comment($this->Comment->DiscussionID);
    }
```

Contributing
------------

Pull requests are welcome.

Donations
---------

If you like ChooseYourOwnFormat, consider making a donation. Suggested amount is $5.

* [Donate by PayPal or credit card](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=jason.barnabe@gmail.com&item_name=Contribution+for+ChooseYourOwnFormat)
* Donate BitCoin to 13vHTPWjL9q9HvkbCNr7ZNcjpD3R33gN3C

License
-------

Copyright (C) 2014-2015 Jason Barnabe <jason.barnabe@gmail.com>

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
