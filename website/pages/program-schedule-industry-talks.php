<section class="program-schedule-industry-talks">
    <h1>VLDB 2025: Invited Industry Talks</h1>

    <div class="schedule-wrap" style="display:none;">
        <div>
            <div data-day="2">
                <abbr long="Tuesday" short="Tue"></abbr>
                <p><strong>27</strong><em>Aug</em></p>
            </div>
        </div>

        <div>
            <div class="schedule-head" id="Invited_Industry_Talks_1">
                <span class="schedule-time">16:00 &ndash; 17:30</span><strong class="main-title">Invited Industry Talks 1: Data Standing Tall in the Clouds</strong>
                <span class="schedule-chair">Chaired by <em>Beng Chin Ooi</em> (NUS, Singapore) at <em>Sacramento / San Francisco</em> room</span> 
            </div>
            
            <p class="schedule-item schedule-item-has-photo">
                <img class="schedule-photo" src="./img/people/FeifeiLi.jpg">
                <strong class="schedule-item-title">Cloud Native Database Systems at Alibaba: Opportunities and Challenges</strong>
                <span class="schedule-item-people">
                    <a class="author" href="mailto:" data-uz="lifeifei" data-at="alibaba-inc.com">Feifei&nbsp;Li</a>&nbsp;(Alibaba)
                </span>
                <span class="schedule-item-abstract">
                    <a class="schedule-item-action"></a>
                    <strong class="schedule-part-label">Abstract:</strong>
                    Cloud native databases become increasingly important for the era of cloud computing, due to the needs for elasticity and on-demand usage by various applications. These challenges from cloud applications present new opportunities for cloud native databases that cannot be fully addressed by traditional on-premise enterprise database systems. A cloud native database leverages software-hardware co-design to explore accelerations offered by new hardware such as RDMA, NVM, kernel bypassing protocols such as SDPK and DPDK, etc. Meanwhile, new design architectures such as shared-storage and shared-everything enable a cloud-native database to decouple computation from storage and provide excellent elasticity. For highly concurrent workloads that require horizontal scalability, a cloud native database can also leverage a shared-nothing layer to provide distributed query and transaction processing. Applications also require that cloud native databases to offer high availability through distributed consensus protocols. At Alibaba, we have explored a suite of technologies to design cloud-native database systems. Our storage engine, X-engine and PolarFS, improves both write and read throughputs by using a LSM-tree design and self-adapted separation of hot and cold data records. Based on these efforts, we have designed and implemented PolarDB and its distributed version PolarDB-X, which has successfully supported the extreme transaction workloads during the 2018 Global Shopping Festival on November 11, 2018, and achieved commercial success on Alibaba cloud. In addition, we have explored a self-driving database platform to achieve autoscaling and intelligent database management. We will report key technologies and lessons learned to highlight the technical challenges and opportunities for cloud native database systems at Alibaba.
                </span>

                <span class="schedule-item-bio">
                    <a class="schedule-item-action"></a>
                    <strong class="schedule-part-label">Bio:</strong>
                    Feifei Li is currently a Vice President of Alibaba Group, ACM Distinguished Scientist, Director of the Database Products Business Unit of Alibaba Cloud and the Database and Storage Lab of DAMO academy. He is also a full professor at the School of Computing, University of Utah (on leave). He has won multiple awards from NSF, ACM, IEEE, Visa, Google, and others. In particular, he is a recipient of the IEEE ICDE 2014 10 Years Most Influential Paper Award, ACM SIGMOD 2016 Best Paper Award, ACM SIGMOD 2015 Best System Demonstration Award, IEEE ICDE 2004 Best Paper Award, NSF Career Award, Google Faculty award, and Visa Faculty award. He has been an associate editor, co-chairs, and core committee members for many prestigious research journals and conferences.
                </span>

            </p>

            <p class="schedule-item schedule-item-has-photo">
                <img class="schedule-photo" src="./img/people/DharmaShukla.jpg">
                <strong class="schedule-item-title">Azure Cosmos DB: Microsoft's Globally Distributed Database Service</strong>
                <span class="schedule-item-people">
                    <a class="author" href="mailto:" data-uz="dharmas" data-at="microsoft.com ">Dharma&nbsp;Shukla</a>&nbsp;(Microsoft)
                </span>
                <span class="schedule-item-abstract">
                    <a class="schedule-item-action"></a>
                    <strong class="schedule-part-label">Abstract:</strong>
                    As a cloud service, Cosmos DB is carefully architected and engineered with multi-tenancy and global distribution from the ground up. Cosmos DB allows customers to add/remove any number of Azure regions to their Cosmos database, at any time. The service allows customers to elastically scale the throughput and storage of their Cosmos database, in an unlimited manner. By virtue of its novel multi-master replication protocol, the service offers guaranteed single-digit millisecond low latencies for writes and reads at P99 along with 99.999 high-availability. Cosmos DB allows developers to choose from five well-defined consistency models. Cosmos DB is used extensively both internally within Microsoft as well as externally by developers using Microsoft Azure. In this talk, Dharma will describe the design of Cosmos DB as well as his learnings from designing and operating a globally distributed service across heterogeneous customer workloads worldwide. Along with several key design ideas, Dharma will also present several crucial engineering choices they had to make.
                </span>

                <span class="schedule-item-bio">
                    <a class="schedule-item-action"></a>
                    <strong class="schedule-part-label">Bio:</strong>
                    Dharma Shukla is a Technical Fellow at Microsoft. Dharma is also the founder and architect of Azure Cosmos DB. You can reach out to Dharma at <span class="hl-blue">dharmas<span class="mail-sep">(AT)</span>microsoft.com</span> or @dharmashukla on Twitter.
                </span>

            </p>

            <p class="schedule-item schedule-item-has-photo">
                <img class="schedule-photo" src="./img/people/MikeCarey.jpg">
                <strong class="schedule-item-title">Couchbase Analytics: NoETL for Scalable NoSQL Data Analysis</strong>
                <span class="schedule-item-people">
                    <a class="author" href="mailto:" data-uz="mjcarey" data-at="ics.uci.edu ">Mike&nbsp;Carey</a>&nbsp;(UCI and Couchbase)
                </span>
                <span class="schedule-item-abstract">
                    <a class="schedule-item-action"></a>
                    <strong class="schedule-part-label">Abstract:</strong>
                    Couchbase Server is a highly scalable document-oriented database management system. With a shared-nothing architecture, it exposes a fast key-value store with a managed cache for sub-millisecond data operations, indexing for fast queries, and a powerful query engine for executing declarative SQL-like queries. Its Query Service debuted several years ago and supports high volumes of low-latency queries and updates for JSON documents. Its recently introduced Analytics Service complements the Query Service. Couchbase Analytics, the focus of this talk, supports complex analytical queries (e.g., ad hoc joins and aggregations) over large collections of JSON documents. This talk will describes the Analytics service from the outside in, including its user model, its SQL++ based query language, and its MPP-based storage and query processing architecture. It will also touch on the relationship of Couchbase Analytics to Apache AsterixDB, the open source Big Data management system at the core of Couchbase Analytics.
                </span>

                <span class="schedule-item-bio">
                    <a class="schedule-item-action"></a>
                    <strong class="schedule-part-label">Bio:</strong>
                    Michael Carey received his B.S. and M.S. degrees from Carnegie-Mellon University and his Ph.D. from the University of California, Berkeley. He is currently a Bren Professor of Information and Computer Sciences and Distinguished Professor of Computer Science at UC Irvine, where he leads the AsterixDB project, as well as a Consulting Architect at Couchbase, Inc. Before joining UCI in 2008, he worked at BEA Systems for seven years and led the development of their AquaLogic Data Services Platform product for virtual data integration. He also spent a dozen years at the University of Wisconsin-Madison, five years at the IBM Almaden Research Center working on object-relational databases, and a year and a half at e-commerce platform startup Propel Software during the infamous 2000-2001 Internet bubble. He is an ACM Fellow, an IEEE Fellow, a member of the National Academy of Engineering, and a recipient of the ACM SIGMOD E.F. Codd Innovations Award. His current interests center around data-intensive computing and scalable data management (a.k.a. Big Data).
                </span>

            </p>


        </div>

        <div>
            <div data-day="3">
                <abbr long="Wednesday" short="Wed"></abbr>
                <p><strong>28</strong><em>Aug</em></p>
            </div>
        </div>

        <div>
            <div class="schedule-head" id="Invited_Industry_Talks_2">
                <span class="schedule-time">16:00 &ndash; 17:30</span><strong class="main-title">Invited Industry Talks 2: Data through the Looking Glass: Performance, In-Mem, & AI</strong>
                <span class="schedule-chair">Chaired by <em>Pat Helland</em> (Salesforce, USA) at <em>Sacramento / San Francisco</em> room</span> 
            </div>
            
            <p class="schedule-item schedule-item-has-photo">
                <img class="schedule-photo" src="./img/people/AdrianColyer.jpg">
                <strong class="schedule-item-title">Performance in the Spotlight</strong>
                <span class="schedule-item-people">
                    <a class="author" href="mailto:" data-uz="acolyer" data-at="accel.com">Adrian&nbsp;Colyer</a>&nbsp;(Accel)
                </span>
                <span class="schedule-item-abstract">
                    <a class="schedule-item-action"></a>
                    <strong class="schedule-part-label">Abstract:</strong>
                    Performance in its various guises features prominently in research evaluations, and rightly so. Without adequate performance a system is not fit for purpose. That doesn't necessarily mean we should pursue performance at all costs though. In this talk we'll explore a variety of additional evaluation criteria, with a focus on those that are most important to practitioners, and ask whether or not considering them can open up interesting avenues of research.
                </span>

                <span class="schedule-item-bio">
                    <a class="schedule-item-action"></a>
                    <strong class="schedule-part-label">Bio:</strong>
                    Adrian is the author of "The Morning Paper", a popular computer science research blog. When he's not reading and summarising research papers, he also works as a Venture Partner for Accel, where it’s his job to help find and build great technology companies out of Europe and Israel. Prior to joining Accel, Adrian held CTO roles at a variety of companies including SpringSource, VMware, and Pivotal.
                </span>

            </p>

            <p class="schedule-item schedule-item-has-photo">
                <img class="schedule-photo" src="./img/people/AlexBoehm.jpg">
                <strong class="schedule-item-title">In-memory for the Masses: Enabling Cost-efficient Deployments of In-memory Data Management Platforms for Business Applications</strong>
                <span class="schedule-item-people">
                    <a class="author" href="mailto:" data-uz="alexander.boehm" data-at="sap.com">Alex&nbsp;Boehm</a>&nbsp;(SAP SE)
                </span>
                <span class="schedule-item-abstract">
                    <a class="schedule-item-action"></a>
                    <strong class="schedule-part-label">Abstract:</strong>
                    With unrivaled performance, modern in-memory data management platforms such as SAP HANA enable the creation of novel types of business applications. By keeping all data in memory, applications may combine both demanding transactional as well as complex analytical workloads in the context of a single system. While this excellent performance, data freshness, and flexibility gain is highly desirable in a vast range of modern business applications, the corresponding large appetite for main memory has significant implications on server sizing. Particularly, hardware costs on premise as well as in the cloud are at risk to increase significantly, driven by the high amount of DRAM that needs to be provisioned potentially. In this talk, we discuss a variety of challenges and opportunities that arise when running business applications in a cost-efficient manner on in-memory database systems. We discuss design possibilities on the database level such as various forms of data compression and compact processing with corresponding trade-offs. We then illustrate how (modern) hardware can help to (automatically) offload parts of the data sets to cheaper storage media such as NVM, SSDs, and disk, without significantly compromising performance from an application point of view. Finally, we illustrate how applications may facilitate TCO-efficient database deployments by modifications to (physical) schema design, as well as synergies with orthogonal, but highly related application topics such as data archiving, as mandated by data privacy regulations.
                </span>

                <span class="schedule-item-bio">
                    <a class="schedule-item-action"></a>
                    <strong class="schedule-part-label">Bio:</strong>
                    Dr. Alexander Boehm is one of the chief architects working on SAP's HANA in-memory database management system. His focus is on performance optimization and holistic improvements of enterprise architectures, in particular application server/DBMS co-design. Prior to joining SAP in 2010, he received his PhD from the University of Mannheim, Germany, where he worked on the development of efficient and scalable applications using declarative message processing.
                </span>

            </p>

            <p class="schedule-item schedule-item-has-photo">
                <img class="schedule-photo" src="./img/people/HaixunWang.jpg">
                <strong class="schedule-item-title">Innovation Around Data and AI for the Physical World</strong>
                <span class="schedule-item-people">
                    <a class="author" href="mailto:" data-uz="haixun.wang" data-at="wework.com ">Haixun&nbsp;Wang</a>&nbsp;(WeWork)
                </span>
                <span class="schedule-item-abstract">
                    <a class="schedule-item-action"></a>
                    <strong class="schedule-part-label">Abstract:</strong>
                    AI and Machine Learning are making big strides in the cyberspace. Yet, there has been limited progress with AI in the physical world. This is mostly due to the challenges around infrastructure — from the need to collect and analyze data in the physical world to the need for taking physical actions. With over 400 buildings around the world, WeWork has a fleet of spaces ripe for experimenting how to blend the physical and the digital. At this scale, every decision from day-to-day ones, such as how to schedule room cleaning, to billion-dollar ones, such as how to source our next building and location, becomes a non-trivial data science problem. While most research and development around smart buildings have focused on energy saving, we see an opportunity to broaden this area to focus on improving the quality of life in workspaces and making businesses more efficient. We believe that intelligent environments will help make space more efficient and the addition of human insight will make for a more engaging experience.
                </span>

                <span class="schedule-item-bio">
                    <a class="schedule-item-action"></a>
                    <strong class="schedule-part-label">Bio:</strong>
                    Haixun Wang is VP of Engineering and Distinguished Scientist at WeWork. He is an IEEE fellow and Editor in Chief of the IEEE Data Engineering Bulletin. Before joining WeWork, he was a Director of Natural Language Processing at Amazon. From 2015 to 2017, he led the NLP organization in Facebook working on query and document understanding. From 2013 to 2015, he was with Google Research, working on natural language processing. From 2009 to 2013, he led research in knowledge bases, graph systems, and text processing at Microsoft Research Asia. He had been a research staff member at IBM T. J. Watson Research Center from 2000 – 2009. He was Technical Assistant to Stuart Feldman (Vice President of Computer Science of IBM Research) from 2006 to 2007, and Technical Assistant to Mark Wegman (Head of Computer Science of IBM Research) from 2007 to 2009. He received the Ph.D. degree in Computer Science from the University of California, Los Angeles in 2000. He has published more than 200 research papers in international journals and conference proceedings. He served as PC chairs of many academic conferences, and he is on the editorial board of journals such as IEEE Transactions of Knowledge and Data Engineering (TKDE) and Journal of Computer Science and Technology (JCST). He won the best paper award in ICDE 2015, 10-year best paper award in ICDM 2013, and best paper award of ER 2009.
                </span>

            </p>


        </div>


    <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
<table class="tg">
<thead>
  <tr>
    <th class="tg-0lax"><span style="font-weight:bold">Accepted Papers</span></th>
    <th class="tg-0lax"><span style="font-weight:bold">Authors</span></th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-0lax">Progressive Partitioning for Parallelized Query Execution in Google's&nbsp;&nbsp;Napa</td>
    <td class="tg-0lax">Jun Tatemura (Google); Tao Zou (Google Inc); Jagan Sankaranarayanan (Google Inc)*; Yanlai Huang (Google Inc); Jim Chen (Google Inc);&nbsp;&nbsp;Yupu&nbsp;&nbsp;Zhang (Google Inc); Kevin Lai (Google Inc); Hao Zhang (Google Inc); Gokul Nath Babu Manoharan (Google); Goetz Graef</td>
  </tr>
  <tr>
    <td class="tg-0lax">Taurus MM: bringing multi-master to the cloud</td>
    <td class="tg-0lax">Alex Depoutovitch (Huawei)*; Paul Larson (Huawei); Jack Ng (Huawei); Shu Lin (Huawei); Chong Chen (Huawei); Guanzhu Xiong (Huawei); Emad Boctor (Huawei); Paul Lee (Huawei); Samiao Ren (Huawei); Lengdong Wu (Huawei); Yuchen Zhang (Huawei); Calvin Sun (Huaw</td>
  </tr>
  <tr>
    <td class="tg-0lax">StreamOps: Cloud-Native Runtime Management for Streaming Services in ByteDance</td>
    <td class="tg-0lax">Yancan Mao (National University of Singapore)*; Zhanghao Chen (ByteDance Inc.); Yifan Zhang (ByteDance Inc.); Meng Wang (ByteDance Inc.); Yong Fang (ByteDance Inc.); Guanghui Zhang (ByteDance Inc.); Rui Shi (ByteDance Inc.); Richard T.B. Ma (National Univ</td>
  </tr>
  <tr>
    <td class="tg-0lax">AutoSteer: Learned Query Optimization for Any SQL Database</td>
    <td class="tg-0lax">Christoph Anneser (Technical University of Munich)*; Nesime Tatbul (Intel Labs and MIT); David E Cohen (Intel); Zhenggang Xu (Meta Platforms, Inc.); Prithviraj P Pandian (Meta); Nikolay Laptev (Facebook); Ryan C Marcus (MIT)</td>
  </tr>
  <tr>
    <td class="tg-0lax">Krypton: Real-time Serving and Analytical SQL Engine at ByteDance</td>
    <td class="tg-0lax">Jianjun Chen (Bytedance)*; Rui Shi (ByteDance Inc.); Heng Chen (ByteDance); Li Zhang (ByteDance); Ruidong Li (Bytedance.com); Wei Ding (Bytedance); Liya Fan (Bytedance corporation); Hao Wang (ByteDance Inc.); Mu Xiong (ByteDance); Yuxiang Chen (ByteDance)</td>
  </tr>
  <tr>
    <td class="tg-0lax">EmbedX: A Versatile, Efficient and Scalable Platform to Embed Both Graphs and High-Dimensional Sparse Data</td>
    <td class="tg-0lax">Yuanhang Zou (Tencent); Zhihao Ding (The Hong Kong Polytechnic University); Jieming Shi (The Hong Kong Polytechnic University)*; Shuting Guo (Tencent ); Chunchen Su (Tencent); Yafei Zhang (Tencent)</td>
  </tr>
  <tr>
    <td class="tg-0lax">The Story of AWS Glue</td>
    <td class="tg-0lax">Mohit Saxena (Amazon Web Services)*; Glue Paper (Amazon Web Services); Benjamin Sowell (Aryn Inc); Mehul Shah (Amazon)</td>
  </tr>
  <tr>
    <td class="tg-0lax">Towards General and Efficient Online Tuning for Spark</td>
    <td class="tg-0lax">Yang Li (Tencent Inc.)*; Huaijun Jiang (Peking University); Yu Shen (Peking University); yide fang (Tencent); Xiaofeng Yang (Tencent); Danqing Huang (Tencent Inc.); Xinyi Zhang (Peking University); Wentao Zhang (Peking University); Ce Zhang (ETH); Peng Ch</td>
  </tr>
  <tr>
    <td class="tg-0lax">CDSBen: Benchmarking the Performance of Storage Services in Cloud-native Database System at ByteDance</td>
    <td class="tg-0lax">Jiashu Zhang (Southern University of Science and Technology); Wen Jiang (Southern University of Science and Technology); Bo Tang&nbsp;&nbsp;(Southern University of Science and Technology)*; Haoxiang Ma (ByteDance); Cao Lixun (ByteDance); ZhongBin Jiang (ByteDance);</td>
  </tr>
  <tr>
    <td class="tg-0lax">FEBench: A Benchmark for Real-Time Relational Data Feature Extraction</td>
    <td class="tg-0lax">Xuanhe Zhou (Tsinghua); Cheng Chen (4Paradigm); Kunyi Li (Tsinghua); Bingsheng He (National University of Singapore); mian lu (4Paradigm Inc.)*; Qiaosheng Liu (4Paradigm); Wei Huang (4Paradigm); Guoliang Li (Tsinghua University); zhao zheng (4Paradigm Inc</td>
  </tr>
  <tr>
    <td class="tg-0lax">MINT: Detecting Fraudulent Behaviors from Time-series Relational Data</td>
    <td class="tg-0lax">Fei Xiao (Shopee Singapore)*; Yuncheng Wu (National University of Singapore); Meihui Zhang (Beijing Institute of Technology); Gang Chen (Zhejiang University); Beng Chin Ooi (NUS)</td>
  </tr>
  <tr>
    <td class="tg-0lax">Microsoft Purview: A System for Central Governance of Data</td>
    <td class="tg-0lax">Shafi Ahmad (Microsoft); Dillidorai Arumugam (Microsoft); Srdan Bozovic (Microsoft); Elnata Degefa (Microsoft); SAILESH K DUVVURI (C and AI); Steven Gott (Microsoft); Nitish Gupta (Microsoft); Joachim Hammer (Microsoft); Nivedita Kaluskar (Microsoft); Rag</td>
  </tr>
  <tr>
    <td class="tg-0lax">Anser: Adaptive Information Sharing Framework of AnalyticDB</td>
    <td class="tg-0lax">Liang Lin (Alibaba); Yuhan Li (Alibaba Cloud Computing Co. Ltd.); Bin Wu (Alibaba Group)*; Huijun Mai (Alibaba); Renjie Lou (Alibaba); Jian Tan (Alibaba); Feifei Li (Alibaba Group)</td>
  </tr>
  <tr>
    <td class="tg-0lax">TPCx-AI - An Industry Standard Benchmark for Artificial Intelligence and Machine Learning Systems</td>
    <td class="tg-0lax">Christoph BrŸcke (bankmark); Philipp HŠrtling (bankmark); Rodrigo D Escobar Palacios (Intel); Hamesh Patel (Intel); Tilmann Rabl (HPI, University of Potsdam)*</td>
  </tr>
  <tr>
    <td class="tg-0lax">OneProvenance: Efficient Extraction of Dynamic Coarse-Grained Provenance From Database Query Event Logs</td>
    <td class="tg-0lax">Fotios Psallidas (Microsoft)*; Ashvin Agrawal (Microsoft); Chandru Sugunan (Snowflake); Khaled Ibrahim (Microsoft); Konstantinos Karanasos (Meta); Jesœs Camacho-Rodr’guez (Microsoft); Avrilia Floratou (Microsoft); Carlo Curino (Microsoft); Raghu Ramakrish</td>
  </tr>
  <tr>
    <td class="tg-0lax">Techniques and Efficiencies from Building a Real-Time DBMS</td>
    <td class="tg-0lax">V Srinivasan (Aerospike)*; B Narendran (Aerospike); Andrew Gooding (Aerospike); Thomas Lopatic (Aerospike); Kevin Porter (Aerospike); Sunil Sayyaparaju (Aerospike); Ashish Shinde (Aerospike)</td>
  </tr>
  <tr>
    <td class="tg-0lax">Real-time Workload Pattern Analysis for Large-scale Cloud Databases</td>
    <td class="tg-0lax">Jiaqi Wang (Zhejiang University); Tianyi Li (Aalborg University); Anni Wang (Alibaba); Xiaoze Liu (Purdue University); Lu Chen (Zhejiang University)*; Jie Chen (Alibaba); Jianye Liu (Alibaba Group); Junyang Wu (Zhejiang University); Feifei Li (Alibaba Gro</td>
  </tr>
  <tr>
    <td class="tg-0lax">Big Data Analytic Toolkit: A general-purpose, modular, and heterogeneous acceleration toolkit for data analytical engines</td>
    <td class="tg-0lax">Jiang Li (Intel Corporation)*; Qi Xie (Intel Corporation); Yan Ma (Intel Corporation ); Jian Ma (Intel Corporation); Kunshang Ji (Intel Corporation); Yizhong Zhang (Intel Corporation); Chaojun Zhang (Intel Corporation); Yixiu Chen (Intel Corporation); Gan</td>
  </tr>
  <tr>
    <td class="tg-0lax">Lindorm TSDB: A Cloud-native Time-series Database for Large-scale Monitoring Systems</td>
    <td class="tg-0lax">shen chunhui (alibaba); Qianyu Ouyang (Alibaba); feibo li (Alibaba group); liu zhipeng (alibaba); Longcheng Zhu (Alibaba); Yujie Zou (Alibaba Group); Qing Su (Alibaba Cloud); Tianhuan Yu (alibaba-inc); Yi Yi (Alibaba Group); jianhong hu ( Alibaba Group );</td>
  </tr>
  <tr>
    <td class="tg-0lax">OceanBase Paetica: A Hybrid Shared-nothing/Shared-everything Database for Supporting Single Machine and Distributed Cluster</td>
    <td class="tg-0lax">Zhifeng Yang (OceanBase); Quanqing Xu (OceanBase)*; Shanyan Gao (OceanBase, Ant Group); Chuanhui Yang (OceanBase); Guoping Wang (OceanBase, Ant Group); Yuzhong Zhao (oceanbase); Fanyu Kong (Oceanbase); Hao Liu (OceanBase); Wanhong Wang (OceanBase, Ant Gro</td>
  </tr>
  <tr>
    <td class="tg-0lax">SimpleTS: An Efficient and Universal Model Selection Framework for Time Series Forecasting</td>
    <td class="tg-0lax">Yuanyuan yuan Yao (Zhejiang University); Dimeng Li (Alibaba Group); Hailiang Jie (Zhejiang University); Lu Chen (Zhejiang University)*; Tianyi Li (Aalborg University); Jie Chen (Alibaba); Jiaqi Wang (Zhejiang University); Feifei Li (Alibaba Group); Yunjun</td>
  </tr>
  <tr>
    <td class="tg-0lax">PallasDB: A Cloud-Native Database Ensuring Low Latency for Strongly Consistent Reads</td>
    <td class="tg-0lax">xinjun Yang (Alibaba Group); Yingqiang Zhang (Alibaba Group); Hao Chen (Alibaba Group )*; Chuan Sun (Alibaba Group); Feifei Li (Alibaba Group); Wenchao Zhou (Alibaba Group)</td>
  </tr>
  <tr>
    <td class="tg-0lax">ScalarDB: Universal Transaction Manager for Polystores</td>
    <td class="tg-0lax">Hiroyuki Yamada (Scalar, Inc.)*; Toshihiro Suzuki (Scalar, Inc.); Yuji Ito (Scalar, Inc.); Jun Nemoto (Scalar, Inc.)</td>
  </tr>
  <tr>
    <td class="tg-0lax">Angel-PTM: A Scalable and Economical Large-scale Pre-training System in Tencent</td>
    <td class="tg-0lax">Xiaonan Nie (Peking University)*; Yi Liu (Tencent); Fangcheng Fu (Peking University); Jinbao Xue (Tencent); Dian Jiao (Tencent); Xupeng Miao (Carnegie Mellon University); Yangyu Tao (Tencent); Bin Cui (Peking University)</td>
  </tr>
  <tr>
    <td class="tg-0lax">Eigen: End-to-end Resource Optimization for Large-Scale Databases on the Cloud</td>
    <td class="tg-0lax">JI YOU LI (Alibaba Group); Jiachi Zhang (Georgetown Univerisity); Wenchao Zhou (Alibaba Group)*; Yuhang Liu (alibaba); shuai zhang (alibaba); Xue Zhuoming (alibaba); Ding Xu (Alibaba Inc); Hua Fan (Alibaba Group); Fangyuan Zhou (Alibaba Group); Feifei Li </td>
  </tr>
  <tr>
    <td class="tg-0lax">MagicScaler: Uncertainty-aware, Predictive Autoscaling</td>
    <td class="tg-0lax">Zhicheng Pan (East China Normal University); Yihang Wang (Alibaba Group); Yingying Zhang (Alibaba Group); Sean Bin Yang (Aalborg University); Peng Chen (East China Normal University); Yunyao Cheng (Aalborg University); Chenjuan Guo (East China Normal Univ</td>
  </tr>
  <tr>
    <td class="tg-0lax">Confluent Cloud: a cloud-native event streaming platform built on Kafka</td>
    <td class="tg-0lax">Anna Povzner (Confluent Inc.)*; Prince Mahajan (Confluent Inc); Jason Gustafson (Confluent Inc.); Kamal Gupta (Confluent Inc.); Jun Rao (Confluent Inc. ); Ismael Juma (Confluent Inc.); Feng Min (Confluent); Shriram Sridharan (Confluent Inc.); Nikhil Bhati</td>
  </tr>
  <tr>
    <td class="tg-0lax">Automatic SQL Error Mitigation in Oracle</td>
    <td class="tg-0lax">Krishna Kantikiran Pasupuleti (Oracle)*; Jiakun Li (Oracle America Inc.); Hong Su (Oracle); Mohamed Ziauddin (Oracle)</td>
  </tr>
  <tr>
    <td class="tg-0lax">PyTorch FSDP: Experiences on Scaling Fully Sharded Data Parallel</td>
    <td class="tg-0lax">Yanli Zhao (meta Inc.); Andrew Gu (Meta); Rohan Varma (Meta); Liang Luo (Meta Inc); Chien-Chin Huang (Meta Platforms, Inc.)*; Min Xu (Meta Platforms, Inc.); Less Wright (Meta Platforms, Inc.); Hamid Shojanazeri (Meta Platforms, Inc.); Myle Ott (Facebook);</td>
  </tr>
</tbody>
</table>

    </div>

</section>
<?php
define('PageTitle', "Program Schedule - Invited Industry Talks");
define('PageDescription', "List of invited industry talks.");
?>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebPage",
  "name": "Invited Industry Talks",
  "url": "https://vldb.org/2025/?program-schedule-industry-talks",
  "description": "List of invited industry talks.",
  "breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [{
      "@type": "ListItem",
      "position": 1,
      "item": {
        "@id": "https://vldb.org/",
        "name": "VLDB"
      }
    },{
      "@type": "ListItem",
      "position": 2,
      "item": {
        "@id": "https://vldb.org/conference.html",
        "name": "Conferences"
      }
    },{
      "@type": "ListItem",
      "position": 3,
      "item": {
        "@id": "https://vldb.org/2025/",
        "name": "2025"
      }
    },{
      "@type": "ListItem",
      "position": 4,
      "item": {
        "@id": "https://vldb.org/2025/?program",
        "name": "Conference Program"
      }
    },{
      "@type": "ListItem",
      "position": 5,
      "item": {
        "@id": "https://vldb.org/2025/?program-schedule-industry-talks",
        "name": "Invited Industry Talks"
      }
    }]
  }
}
</script>