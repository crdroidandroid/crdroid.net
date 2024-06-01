---
title: Sign your crDroid builds and keep Play Integrity happy
description:  A guide to using signed keys for crDroid builds
author: Lup Gabriel
---

Hey crDroid enthusiasts! 

Google's been cracking down on unsigned custom ROMs passing Play Integrity checks. To stay on the safe side, you'll now need to sign your ROM packages with release keys instead of test keys.

Since crDroid is open-source, we want to empower you to create your own signing keys. Our awesome team member *@the306bobby* built a script specifically for this purpose. Head over to [his GitHub page](https://github.com/306bobby-android/crDroid-build-signed-script) to grab it and get started.

**Bonus!** This script isn't just for crDroid. You can adapt it for other ROMs as well.

**crDroid Builders:**  

No need to add *-include vendor/lineage-priv/keys/keys.mk*  in your device tree sources anymore.

Happy building!
