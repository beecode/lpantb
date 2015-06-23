#!/usr/bin/env python
#-*- coding:utf-8 -*-
import sys
from PySide.QtCore import *
from PySide.QtGui import *
from PySide.QtWebKit import *

app = QApplication(sys.argv)


web = QWebView()
#web.setWindowFlags(Qt.FramelessWindowHint)
#web.showFullScreen()
web.load(QUrl("http://lpantb.dev"))
web.show()

sys.exit(app.exec_())
